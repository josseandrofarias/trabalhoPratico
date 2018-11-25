package unigran.br.locvec;

import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.github.rtoshiro.util.format.SimpleMaskFormatter;
import com.github.rtoshiro.util.format.text.MaskTextWatcher;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;

import locvec.unigran.br.locvec.R;
import unigran.br.locvec.DAO.Banco;

public class LocacaoGerenciamento extends AppCompatActivity {

    private Button btnSalvar, btnDeletar;
    private EditText etNumCliente, etNumCarro, etDataLocacao;
    Banco bd;
    SQLiteDatabase con;

    private int id;
    private int idCliente;
    private int idCarro;
    private String dataLocacao;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_locacao_gerenciamento);
        btnSalvar = findViewById(R.id.button4);
        btnDeletar = findViewById(R.id.button5);
        etNumCliente =  findViewById(R.id.editText3);
        etNumCarro = findViewById(R.id.editText2);
        etDataLocacao = findViewById(R.id.editText);

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setHomeButtonEnabled(true);
        getSupportActionBar().setTitle("Gerenciamento de Locação");

        SimpleMaskFormatter smfDataLocacao = new SimpleMaskFormatter("NN/NN/NNNN");
        MaskTextWatcher mtwDataLocacao = new MaskTextWatcher(etDataLocacao, smfDataLocacao);
        etDataLocacao.addTextChangedListener(mtwDataLocacao);

        bd = new Banco(this);

        Intent intentRecebida = getIntent();

        id = intentRecebida.getIntExtra("id",-1); //VARIAVEL RECEBE O ID DA ACTIVITY ListaLocacao

        Cursor data = selecionarLocacaoID(id);

        while(data.moveToNext()) {
            idCliente = data.getInt(data.getColumnIndex("idCliente"));
            idCarro = data.getInt(data.getColumnIndex("idCarro"));
            dataLocacao = data.getString(data.getColumnIndex("dataLocacao"));
        }
        //TRECHO RESPONSAVEL POR TRANSFORMAR A DATA EM PADRÃO DIA/MES/ANO
        SimpleDateFormat entrada = new SimpleDateFormat("yyyy-MM-dd");
        SimpleDateFormat saida = new SimpleDateFormat("dd/MM/yyyy");
        Date dataInicial;
        String dataString = null;

        try {
            dataInicial = entrada.parse(dataLocacao);
            dataString = saida.format(dataInicial);
        } catch (ParseException e) {
            e.printStackTrace();
        }
        //TRECHO RESPONSAVEL POR TRANSFORMAR A DATA EM PADRÃO DIA/MES/ANO

        etNumCliente.setText(idCliente+"");
        etNumCarro.setText(idCarro+"");
        etDataLocacao.setText(dataString);

        btnSalvar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                int itemIDCliente = Integer.parseInt(etNumCliente.getText().toString());
                int itemIDCarro = Integer.parseInt(etNumCarro.getText().toString());
                try {
                    java.util.Date dataInicial = new SimpleDateFormat("dd/MM/yyyy").parse(etDataLocacao.getText().toString());
                    SimpleDateFormat formatarData = new SimpleDateFormat("yyyy-MM-dd");
                    String dataString = formatarData.format(dataInicial);
                    java.sql.Date itemDataConvertida = java.sql.Date.valueOf(dataString);
                    if(!etNumCliente.equals("") && !etNumCarro.equals("") && !etDataLocacao.equals("")) { //VERIFICA SE OS CAMPOS ESTÃO PREENCHIDOS
                        editarLocacao(id, itemIDCliente, itemIDCarro,itemDataConvertida);
                        toast("Editado com Sucesso!");
                    } else {
                        toast("Erro!");
                    }
                } catch (ParseException e) {

                }

            }
        });

        btnDeletar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                deletarLocacao(id);
                etNumCliente.setText("");
                etNumCarro.setText("");
                etDataLocacao.setText("");
                toast("Deletado com Sucesso!");
                btnSalvar.setEnabled(false);
            }
        });
    }

    public void deletarLocacao(int idLocacao) { //FUNÇÃO PARA DELETAR LOCAÇÕES
        con = bd.getWritableDatabase();
        String query = "DELETE FROM locacao WHERE id = '" +  idLocacao + "';";
        con.execSQL(query);
    } //FUNÇÃO PARA DELETAR LOCAÇÕES

    public void editarLocacao(int id, int idCliente, int idCarro, Date dataLocacao) { //FUNÇÃO RESPONSAVEL POR REALIZAR UPDATE DA LOCAÇÃO
        con = bd.getWritableDatabase();
        String query = "UPDATE locacao SET idCliente = '" + idCliente + "', " +
                "idCarro = '" + idCarro + "', " +
                "dataLocacao = '" + dataLocacao + "' " +
                "WHERE id = " + id + ";";
        con.execSQL(query);
    } //FUNÇÃO RESPONSAVEL POR REALIZAR UPDATE DA LOCAÇÃO

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case android.R.id.home:
                startActivity(new Intent(this, ListaLocacao.class));
                finishAffinity();
                break;
            default:break;
        }
        return true;
    }

    public void toast(String msg) {
        Toast.makeText(this, msg, Toast.LENGTH_LONG).show();
    }

    public Cursor selecionarLocacaoID(int idLoc) {
        bd = new Banco(this);
        con = bd.getWritableDatabase();
        String query = "SELECT id, idCliente, idCarro, dataLocacao FROM locacao WHERE id = '" + idLoc + "';";
        Cursor data = con.rawQuery(query, null);
        return data;
    }
}
