package unigran.br.locvec;

import android.content.DialogInterface;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.text.format.DateFormat;
import android.view.View;
import android.widget.CheckBox;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.Toast;

import com.github.rtoshiro.util.format.SimpleMaskFormatter;
import com.github.rtoshiro.util.format.text.MaskTextWatcher;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import java.util.Locale;

import locvec.unigran.br.locvec.R;
import unigran.br.locvec.Entidades.EFuncionario;
import unigran.br.locvec.Utilitarios.MáscaraCampoData;

public class FuncionarioManutencao extends AppCompatActivity {

    private EditText vNome;
    private EditText vEndereco;
    private EditText vRG;
    private EditText vCPF;
    private EditText vCargo;
    private EditText vAdmissao;
    private EditText vDemissao;
    private CheckBox vFlagSupervisor;
    private CheckBox vFlagDesativado;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_funcionario_manutencao);

        vNome = findViewById(R.id.etNome);
        vEndereco = findViewById(R.id.etEndereco);
        vRG = findViewById(R.id.etRG);
        vCPF = findViewById(R.id.etCPF);
        vCargo = findViewById(R.id.etCargo);
        vAdmissao = findViewById(R.id.etAdmissao);
        vDemissao = findViewById(R.id.etDemissao);
        vFlagSupervisor = findViewById(R.id.ckBoxSupervisor);
        vFlagDesativado = findViewById(R.id.ckBoxDesativado);

        //mascara
        SimpleMaskFormatter smfCPF = new SimpleMaskFormatter("NNN.NNN.NNN-NN");
        MaskTextWatcher mtwCPF = new MaskTextWatcher(vCPF, smfCPF);
        vCPF.addTextChangedListener(mtwCPF);

        SimpleMaskFormatter smfDateAdmissao = new SimpleMaskFormatter("NN/NN/NNNN");
        MaskTextWatcher mtwDateAdmissao = new MaskTextWatcher(vAdmissao, smfDateAdmissao);
        vAdmissao.addTextChangedListener(mtwDateAdmissao);

        SimpleMaskFormatter smfDateDemissao = new SimpleMaskFormatter("NN/NN/NNNN");
        MaskTextWatcher mtwDateDemissao = new MaskTextWatcher(vDemissao, smfDateDemissao);
        vDemissao.addTextChangedListener(mtwDateDemissao);
    }

    public void acSalvar(View view) {
        if(TextUtils.isEmpty(vNome.getText())){
            Toast.makeText(getApplicationContext(), "Informe um nome", Toast.LENGTH_LONG).show();
        }else if (TextUtils.isEmpty(vEndereco.getText())){
            Toast.makeText(getApplicationContext(), "Informe um endereço", Toast.LENGTH_LONG).show();
        }else if(TextUtils.isEmpty(vCPF.getText())){
            Toast.makeText(getApplicationContext(), "Informe um CPF", Toast.LENGTH_LONG).show();
        }else if(TextUtils.isEmpty(vRG.getText())){
            Toast.makeText(getApplicationContext(), "Informe um RG", Toast.LENGTH_LONG).show();
        }else{
            EFuncionario efunc = new EFuncionario();
            efunc.setvNome(vNome.getText().toString());
            efunc.setvEndereco(vEndereco.getText().toString());
            efunc.setvRG(vRG.getText().toString());
            efunc.setvCPF(vCPF.getText().toString());
            efunc.setvCargo(vCargo.getText().toString());
            SimpleDateFormat formatoDate = new SimpleDateFormat("dd/MM/yyyy");
            Date vDateAdmissao = formatoDate.parse(vAdmissao.getText().toString(),null);
            Date vDateDemissao = formatoDate.parse(vDemissao.getText().toString(),null);
            efunc.setvAdmissao(vDateAdmissao);
            efunc.setvDemissao(vDateDemissao);
            efunc.setvFlagSupervisor(vFlagSupervisor.getIncludeFontPadding());
            efunc.setvFlagDesativado(vFlagSupervisor.getIncludeFontPadding());


            try{
                //DAO.add(efunc);
                Toast.makeText(getApplicationContext(), "Funcionário cadastrado!", Toast.LENGTH_LONG).show();
                onBackPressed();
            }catch (Exception e){
                Toast.makeText(getApplicationContext(), "Houve um erro, verique e tente " +
                        "novamente...", Toast.LENGTH_LONG).show();
            }
        }
    }

    public void acSair(View view) {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setMessage("Deseja cancelar?");
        builder.setCancelable(true);
        builder.setPositiveButton("Sim, vou!", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                onBackPressed();
            }
        });
        builder.setNegativeButton("Ok, vou terminar :)", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                dialog.cancel();
            }
        });
        AlertDialog alert = builder.create();
        alert.show();

    }

}
