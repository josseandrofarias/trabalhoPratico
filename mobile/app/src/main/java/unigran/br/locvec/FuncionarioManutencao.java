package unigran.br.locvec;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.EditText;

import locvec.unigran.br.locvec.R;

public class FuncionarioManutencao extends AppCompatActivity {

    private EditText vNome;
    private EditText vEndereco;
    private EditText vRG;
    private EditText vCPF;
    private EditText vCargo;
    private EditText vAdmissao;
    private EditText vDemissao;
    private boolean vFlagSupervisor;
    private boolean vFlagDesativado;

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

        SimpleMaskFormatter smfAdmissao = new SimpleMaskFormatter("NN/NN/NNNN");
        MaskTextWatcher mtwAdmissao = new MaskTextWatcher(vAdmissao, smf);
        vAdmissao.addTextChangedListener(mtwAdmissao);

        SimpleMaskFormatter smfDemissao = new SimpleMaskFormatter("NN/NN/NNNN");
        MaskTextWatcher mtwDemissao = new MaskTextWatcher(vAdmissao, smfDemissao);
        vDemissao.addTextChangedListener(mtwDemissao);
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
            Pessoa pessoa = new Pessoa();
            pessoa.setvNome(nome.getText().toString());
            pessoa.setvEmail(email.getText().toString());
            pessoa.setvFone(telefone.getText().toString());

            try{
                DAO.add(pessoa);
                Toast.makeText(getApplicationContext(), "Muito bem " + pessoa.getvNome(), Toast.LENGTH_LONG).show();
                onBackPressed();
            }catch (Exception e){
                Toast.makeText(getApplicationContext(), "É, não deu muito certo!", Toast.LENGTH_LONG).show();
            }
        }

    }

}
