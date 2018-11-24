package unigran.br.locvec;

import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
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

        SimpleMaskFormatter smfDataLocacao = new SimpleMaskFormatter("NN/NN/NNNN");
        MaskTextWatcher mtwDataLocacao = new MaskTextWatcher(etDataLocacao, smfDataLocacao);
        etDataLocacao.addTextChangedListener(mtwDataLocacao);

        bd = new Banco(this);

        Intent intentRecebida = getIntent();

        id = intentRecebida.getIntExtra("id",-1);

        Cursor data = selecionarLocacaoID(id);

        while(data.moveToNext()) {
            idCliente = data.getInt(data.getColumnIndex("idCliente"));
            idCarro = data.getInt(data.getColumnIndex("idCarro"));
            dataLocacao = data.getString(data.getColumnIndex("dataLocacao"));
        }

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

        etNumCliente.setText(idCliente+"");
        etNumCarro.setText(idCarro+"");
        etDataLocacao.setText(dataString);
    }

    public Cursor selecionarLocacaoID(int idLoc) {
        bd = new Banco(this);
        con = bd.getWritableDatabase();
        String query = "SELECT id, idCliente, idCarro, dataLocacao FROM locacao WHERE id = '" + idLoc + "';";
        Cursor data = con.rawQuery(query, null);
        return data;
    }
}
