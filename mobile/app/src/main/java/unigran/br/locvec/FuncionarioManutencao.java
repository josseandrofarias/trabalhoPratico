package unigran.br.locvec;

import android.annotation.SuppressLint;
import android.content.ContentValues;
import android.content.DialogInterface;
import android.content.Intent;
import android.database.sqlite.SQLiteDatabase;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.EditText;
import android.widget.Switch;
import android.widget.Toast;

import com.github.rtoshiro.util.format.SimpleMaskFormatter;
import com.github.rtoshiro.util.format.text.MaskTextWatcher;

import locvec.unigran.br.locvec.R;
import unigran.br.locvec.DAO.Banco;
import unigran.br.locvec.Entidades.EFuncionario;
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
    private Switch vFlagSupervisor;
    private Switch vFlagDesativado;

    private EFuncionario efuncionario;
    private Banco banco;
    Banco bd;
    private SQLiteDatabase conexao;
    private SQLiteDatabase db;
    String codigo;

    @SuppressLint("WrongViewCast")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_funcionario_manutencao);
        codigo = this.getIntent().getStringExtra("codigo");

        vNome = findViewById(R.id.etNome);
        vEndereco = findViewById(R.id.etEndereco);
        vRG = findViewById(R.id.etRG);
        vCPF = findViewById(R.id.etCPF);
        vCargo = findViewById(R.id.etCNH);
        vAdmissao = findViewById(R.id.etNdependentes);
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
            vAdmissao.setText(efuncionario.getvAdmissao());
            vDemissao.setText(efuncionario.getvDemissao());
            vSenha.setText(efuncionario.getvSenha());
            vFlagSupervisor.setText(efuncionario.getvFlagSupervisor());
            vFlagDesativado.setText(efuncionario.getvFlagDesativado());
        }
    }

    public void acSalvar(View view) {
        ValidaCPF objValida = new ValidaCPF();
        //remove formatação do cpf para validação
        String vTempCPF = vCPF.getText().toString().replaceAll("[^0-9]", "");
        String vData = vAdmissao.getText().toString().replaceAll("[^0-6]", "");

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
            EFuncionario efuncionario = new EFuncionario();
            efuncionario.setvNome(vNome.getText().toString());
            efuncionario.setvEndereco(vEndereco.getText().toString());
            efuncionario.setvRG(vRG.getText().toString());
            efuncionario.setvCPF(vCPF.getText().toString().replaceAll("[^0-9]", ""));
            efuncionario.setvCargo(vCargo.getText().toString());
            efuncionario.setvAdmissao(vAdmissao.getText().toString());
            efuncionario.setvAdmissao(vDemissao.getText().toString());
            efuncionario.setvSenha(vSenha.getText().toString());
            efuncionario.setvFlagSupervisor(0);
            efuncionario.setvFlagDesativado(0);
            if (vFlagSupervisor.isChecked())
                efuncionario.setvFlagSupervisor(1);
            if (vFlagDesativado.isChecked())
                efuncionario.setvFlagDesativado(1);

            banco = new Banco(this);
            db = banco.getReadableDatabase();
            if(codigo == null) {
                try {
                    ContentValues values = new ContentValues();
                    long resultado;
                    values.put("nome", efuncionario.getvNome());
                    values.put("cpf", efuncionario.getvCPF());
                    values.put("rg", efuncionario.getvRG());
                    values.put("senha", efuncionario.getvSenha());
                    values.put("endereco", efuncionario.getvEndereco());
                    values.put("cargo", efuncionario.getvCargo());
                    values.put("deativado", efuncionario.getvFlagDesativado());
                    values.put("supervisor", efuncionario.getvFlagSupervisor());
                    values.put("dataAdmissao", efuncionario.getvAdmissao());
                    values.put("dataDemissao", efuncionario.getvDemissao());
                    resultado = db.insertOrThrow("funcionario" , null, values);
                    db.close();
                    Toast.makeText(getApplicationContext(), "Cadastro realizado", Toast.LENGTH_SHORT).show();
                } catch (Error e) {
                    Toast.makeText(getApplicationContext(), "Erro " + e.getMessage(), Toast.LENGTH_SHORT).show();
                }
            }else{ //rotina de update
                try {
                    ContentValues values = new ContentValues();
                    long resultado;
                    values.put("nome", efuncionario.getvNome());
                    values.put("cpf", efuncionario.getvCPF());
                    values.put("rg", efuncionario.getvRG());
                    values.put("senha", efuncionario.getvSenha());
                    values.put("endereco", efuncionario.getvEndereco());
                    values.put("cargo", efuncionario.getvCargo());
                    values.put("deativado", efuncionario.getvFlagDesativado());
                    values.put("supervisor", efuncionario.getvFlagSupervisor());
                    values.put("dataAdmissao", efuncionario.getvAdmissao());
                    values.put("dataDemissao", efuncionario.getvDemissao());

                    String where = "id=?";
                    String[] whereArgs = new String[] {String.valueOf(codigo+1)};

                    resultado = db.update("funcionario", values, where, whereArgs);
                    codigo = null;
                } catch (Exception e) {
                    e.printStackTrace();
                }
                db.close();
            }
        }
        Intent it = new Intent(FuncionarioManutencao.this, Funcionario.class);
        startActivity(it);
    }

    public void acSair(View view) {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setMessage("Deseja cancelar?");
        builder.setCancelable(true);
        builder.setPositiveButton("Sim, vou!", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialogInterface, int i) {
                Intent it = new Intent(FuncionarioManutencao.this, Funcionario.class);
                startActivity(it);
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
