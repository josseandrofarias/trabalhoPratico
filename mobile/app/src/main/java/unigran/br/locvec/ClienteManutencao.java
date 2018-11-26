package unigran.br.locvec;

import android.content.ContentValues;
import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.EditText;
import android.widget.Switch;
import android.widget.Toast;

import java.util.Date;

import locvec.unigran.br.locvec.R;
import unigran.br.locvec.DAO.Banco;
import unigran.br.locvec.Entidades.ECliente;
import unigran.br.locvec.Entidades.EVeiculo;

public class ClienteManutencao extends AppCompatActivity {

    private SQLiteDatabase db;
    private Banco banco;
    String codigo;
    Cursor cursor;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cliente_manutencao);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true); //Mostrar o botão
        getSupportActionBar().setHomeButtonEnabled(true);      //Ativar o botão
        getSupportActionBar().setTitle("Cadastro de cliente");     //Titulo para ser exib
        codigo = this.getIntent().getStringExtra("codigo"); //pegando via bundle

        EditText nome = findViewById(R.id.etNome);
        EditText cpf = findViewById(R.id.etCPF);
        EditText rg = findViewById(R.id.etRG);
        EditText cnh = findViewById(R.id.etCNH);
        EditText endereco = findViewById(R.id.etEndereco);
        EditText numeroDependentes = findViewById(R.id.etNdependentes);

        if (codigo != null) {
            cursor = carregaDadoById(Integer.parseInt(codigo) + 1);
            nome.setText(cursor.getString(cursor.getColumnIndexOrThrow("nome")));
            cpf.setText(cursor.getString(cursor.getColumnIndexOrThrow("cpf")));
            rg.setText(cursor.getString(cursor.getColumnIndexOrThrow("rg")));
            cnh.setText(cursor.getString(cursor.getColumnIndexOrThrow("cnh")));
            endereco.setText(cursor.getString(cursor.getColumnIndexOrThrow("endereco")));
            numeroDependentes.setText(cursor.getString(cursor.getColumnIndexOrThrow("numeroDependentes")));
        }


    }
    //metodo  para o botao da action ba voltar
    @Override
    public boolean onOptionsItemSelected(MenuItem item) { //Botão adicional na ToolBar
        switch (item.getItemId()) {
            case android.R.id.home:  //ID do seu botão (gerado automaticamente pelo android, usando como está, deve funcionar
                startActivity(new Intent(this, ListaCliente.class));  //O efeito ao ser pressionado do botão (no caso abre a activity)
                finishAffinity();  //Método para matar a activity e não deixa-lá indexada na pilhagem
                break;
            default:
                break;
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

    public void btnCadastra(View view) {
        //criando objeto veiculo
        //mapeando os edit text
        EditText nome = findViewById(R.id.etNome);
        EditText cpf = findViewById(R.id.etCPF);
        EditText rg = findViewById(R.id.etRG);
        EditText cnh = findViewById(R.id.etCNH);
        EditText endereco = findViewById(R.id.etEndereco);
        EditText numeroDependentes = findViewById(R.id.etNdependentes);

        try {


            if (nome.getText().length() > 0 && nome.getText().length() > 0 && cpf.getText().length() > 0 && rg.getText().length() > 0 && cnh.getText().length() > 0 && endereco.getText().length() > 0 && numeroDependentes.getText().length() > 0) {
                ECliente cliente = new ECliente();
                cliente.setNome(nome.getText() + "");
                cliente.setCPF(cpf.getText() + "");
                cliente.setRG(rg.getText().toString());
                cliente.setCNH(cnh.getText().toString());
                cliente.setEndereco(endereco.getText().toString());
                cliente.setNumeroDependentes(Integer.parseInt(numeroDependentes.getText().toString()));
                cliente.setDataCadastro(new Date()); //chamando data atual para cadastro
                salvarCliente(cliente);
                Toast.makeText(getApplicationContext(), "Cliente cadastrado!", Toast.LENGTH_SHORT).show();
                Intent intent = new Intent(ClienteManutencao.this, ListaCliente.class);
                startActivity(intent);

            } else {
                Toast.makeText(getApplicationContext(), "Todos os campos devem ser preenchidos.", Toast.LENGTH_SHORT).show();
            }


        } catch (Error e) {
            Toast.makeText(getApplicationContext(), "Erro ao cadastrar: " + e.getMessage(), Toast.LENGTH_LONG).show();
        }


    }


    public String salvarCliente(ECliente eCliente) {
        banco = new Banco(this);
        db = banco.getReadableDatabase();

        if (codigo == null) { //vou salvar se o codigo for null
            try {

                ContentValues values = new ContentValues();
                long resultado;
                values.put("nome", eCliente.getNome());
                values.put("cpf", eCliente.getCPF());
                values.put("rg", eCliente.getRG());
                values.put("cnh", eCliente.getCNH());
                values.put("endereco", eCliente.getEndereco());
                values.put("numeroDependentes", eCliente.getNumeroDependentes());
                values.put ("dataCad",eCliente.getDataCadastro().toString());
                resultado = db.insert("cliente", null, values);



            } catch (Error e) {
                System.out.println("erro" + e.getMessage());

            }
        } else { //rotina de update
            try {

                ContentValues values = new ContentValues();
                long resultado;
                values.put("nome", eCliente.getNome());
                values.put("cpf", eCliente.getCPF());
                values.put("rg", eCliente.getRG());
                values.put("cnh", eCliente.getCNH());
                values.put("endereco", eCliente.getEndereco());
                values.put("numeroDependentes", eCliente.getNumeroDependentes());
                values.put ("dataCad",eCliente.getDataCadastro().toString());

                String where = "id=?";
                String[] whereArgs = new String[]{String.valueOf(codigo + 1)};

                resultado = db.update("cliente", values, where, whereArgs);
                codigo = null;
            } catch (Exception e) {
                e.printStackTrace();
            }

            db.close();

        }

        return "Registro Inserido com sucesso";
    }

    //metodo utilizado para carregar os dados do editar
    public Cursor carregaDadoById(int id) {
        banco = new Banco(this);
        db = banco.getReadableDatabase();
        String[] campos = {"id", "nome", "cpf", "rg", "cnh", "endereco", "numeroDependentes", "dataCad"};
        String where = "id" + "=" + id;
        db = banco.getReadableDatabase();
        cursor = db.query("cliente", campos, where, null, null, null, null, null);

        if (cursor != null) {
            cursor.moveToFirst();
        }
        db.close();
        return cursor;
    }


    public void btnDeleta(View view) {
        // deletaRegistro();
    }
}

