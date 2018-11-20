package unigran.br.locvec;

import android.content.ContentValues;
import android.content.DialogInterface;
import android.database.sqlite.SQLiteDatabase;
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
import unigran.br.locvec.DAO.Banco;
import unigran.br.locvec.Entidades.EFuncionario;
import unigran.br.locvec.Utilitarios.MáscaraCampoData;
import unigran.br.locvec.Utilitarios.ValidaCPF;

public class FuncionarioManutencao extends AppCompatActivity {

    private EditText vNome;
    private EditText vEndereco;
    private EditText vRG;
    private EditText vCPF;
    private EditText vCargo;
    private EditText vAdmissao;
    private EditText vDemissao;
    private EditText vSenha;
    private CheckBox vFlagSupervisor;
    private CheckBox vFlagDesativado;

    private EFuncionario efuncionario;
    Banco bd;
    private SQLiteDatabase conexao;

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
        vSenha = findViewById(R.id.etPassWd);
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

        efuncionario = (EFuncionario) getIntent().getSerializableExtra("funcionario");
        if(efuncionario!=null){
            vNome.setText(efuncionario.getvNome());
            vEndereco.setText(efuncionario.getvEndereco());
            vRG.setText(efuncionario.getvRG());
            vCPF.setText(efuncionario.getvCPF());
            vCargo.setText(efuncionario.getvCargo());
            vAdmissao.setText(efuncionario.getvAdmissao().toString());
            vDemissao.setText(efuncionario.getvDemissao().toString());
            vSenha.setText(efuncionario.getvSenha());
            vFlagSupervisor.setChecked(efuncionario.getvFlagSupervisor());
            vFlagDesativado.setChecked(efuncionario.getvFlagDesativado());
        }
    }

    public void acSalvar(View view) {
        ValidaCPF objValida = new ValidaCPF();
        //remove formatação do cpf para validação
        String vTempCPF = vCPF.getText().toString().replaceAll("[^0-9]", "");

        if(TextUtils.isEmpty(vNome.getText())){
            Toast.makeText(getApplicationContext(), "Informe um nome", Toast.LENGTH_LONG).show();
        }else if (TextUtils.isEmpty(vEndereco.getText())){
            Toast.makeText(getApplicationContext(), "Informe um endereço", Toast.LENGTH_LONG).show();
        }else if(TextUtils.isEmpty(vCPF.getText())){
            Toast.makeText(getApplicationContext(), "Informe um CPF", Toast.LENGTH_LONG).show();
        }else if(TextUtils.isEmpty(vRG.getText())){
            Toast.makeText(getApplicationContext(), "Informe um RG", Toast.LENGTH_LONG).show();
        }else if(objValida.CPFValida(vTempCPF) == false){
            Toast.makeText(getApplicationContext(), "CPF incorreto", Toast.LENGTH_LONG).show();
        }else{
            if (efuncionario == null)
                efuncionario = new EFuncionario();
            efuncionario.setvNome(vNome.getText().toString());
            efuncionario.setvEndereco(vEndereco.getText().toString());
            efuncionario.setvRG(vRG.getText().toString());
            efuncionario.setvCPF(vCPF.getText().toString());
            efuncionario.setvCargo(vCargo.getText().toString());
            efuncionario.setvAdmissao(new Date (vAdmissao.getText().toString()));
            efuncionario.setvAdmissao(new Date (vDemissao.getText().toString()));
            efuncionario.setvSenha(vSenha.getText().toString());
            efuncionario.setvFlagSupervisor(vFlagSupervisor.getIncludeFontPadding());
            efuncionario.setvFlagDesativado(vFlagDesativado.getIncludeFontPadding());

            bd = new Banco(this);
            try{
                conexao = bd.getWritableDatabase();
                ContentValues values = new ContentValues();
                values.put("nome", efuncionario.getvNome());
                values.put("cpf", efuncionario.getvCPF());
                values.put("rg", efuncionario.getvRG());
                values.put("senha", efuncionario.getvSenha());
                values.put("endereco", efuncionario.getvEndereco());
                values.put("cargo", efuncionario.getvCargo());
                values.put("deativado", efuncionario.getvFlagDesativado());
                values.put("supervisor", efuncionario.getvFlagSupervisor());
                values.put("dataAdmissao", efuncionario.getvAdmissao().toString());
                values.put("dataDemissao", efuncionario.getvDemissao().toString());

                conexao.insert("funcionario", null, values);
                conexao.close();
                Toast.makeText(getApplicationContext(), "Funcionário cadastrado!", Toast.LENGTH_LONG).show();
                finish();
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
                finish();
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
