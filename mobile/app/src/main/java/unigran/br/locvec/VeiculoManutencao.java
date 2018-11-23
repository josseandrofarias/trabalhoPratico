package unigran.br.locvec;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.EditText;
import android.widget.Switch;
import android.widget.Toast;

import java.util.Date;

import locvec.unigran.br.locvec.R;
import unigran.br.locvec.DAO.DaoVeiculo;
import unigran.br.locvec.Entidades.EVeiculo;

public class VeiculoManutencao extends AppCompatActivity {


    /*EditText cor;
    EditText valorLocacao;
    EditText marca;
    EditText modelo;
    EditText nome;
    EditText placa;
    EditText valorSeguro;
    Switch veiculoAtivo; */

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_veiculo_manutencao);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true); //Mostrar o botão
        getSupportActionBar().setHomeButtonEnabled(true);      //Ativar o botão
        getSupportActionBar().setTitle("Cadastro do veículo");     //Titulo para ser exib


    }

    //metodo  para o botao da action ba voltar
    @Override
    public boolean onOptionsItemSelected(MenuItem item) { //Botão adicional na ToolBar
        switch (item.getItemId()) {
            case android.R.id.home:  //ID do seu botão (gerado automaticamente pelo android, usando como está, deve funcionar
                startActivity(new Intent(this, ListaVeiculo.class));  //O efeito ao ser pressionado do botão (no caso abre a activity)
                finishAffinity();  //Método para matar a activity e não deixa-lá indexada na pilhagem
                break;
            default:break;
        }
        return true;
    }


    @Override
    public void finish() {
        Intent intent = new Intent();
        setResult(1, intent);
        super.finish();
    }

    @Override
    public void onBackPressed() {
        //Caso saia da tela chamar metodo finish
        finish();
        super.onBackPressed();
    }

    public void btnCadastra(View view){
        //criando objeto veiculo
        //mapeando os edit text
        EditText cor = findViewById(R.id.edtCor);
        EditText valorLocacao = findViewById(R.id.edtLocacao);
        EditText marca = findViewById(R.id.edtMarca);
        EditText modelo = findViewById(R.id.edtModelo);
        EditText nome = findViewById(R.id.edtNome);
        EditText placa = findViewById(R.id.edtPlaca);
        EditText valorSeguro = findViewById(R.id.edtSeguro);
        Switch veiculoAtivo = findViewById(R.id.swtVeiculoAtivo);

        try{
            EVeiculo veiculo = new EVeiculo();
            veiculo.setNome(nome.getText()+"");
            veiculo.setPlaca(placa.getText()+"");
            veiculo.setCor(cor.getText().toString());
            veiculo.setMarca(marca.getText().toString());
            veiculo.setModelo(modelo.getText().toString());
            veiculo.setValorLocacao(Float.parseFloat(valorLocacao.getText().toString()));
            veiculo.setValorSeguro(Float.parseFloat(valorSeguro.getText().toString()));
            veiculo.setDataCad(new Date()); //chamando data atual para cadastro

            DaoVeiculo veic = new DaoVeiculo(getApplicationContext());
            veic.abreConexao();
            String msg = veic.salvarVeiculo(veiculo);
            //veic.fechaConexao();

            Toast.makeText(getApplicationContext(), ""+msg, Toast.LENGTH_SHORT).show();
            finish();
        }catch (Error e){
            Toast.makeText(getApplicationContext(), "Erro ao cadastrar: " + e.getMessage(), Toast.LENGTH_LONG).show();
        }


    }

}
