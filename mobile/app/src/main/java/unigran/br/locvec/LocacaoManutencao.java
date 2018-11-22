package unigran.br.locvec;

import android.content.ContentValues;
import android.content.Intent;
import android.database.sqlite.SQLiteDatabase;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.MenuItem;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import com.github.rtoshiro.util.format.SimpleMaskFormatter;
import com.github.rtoshiro.util.format.text.MaskTextWatcher;

import java.text.ParseException;
import java.text.SimpleDateFormat;

import locvec.unigran.br.locvec.R;
import unigran.br.locvec.DAO.Banco;
import unigran.br.locvec.Entidades.ELocacao;

public class LocacaoManutencao extends AppCompatActivity {

    Banco bd;
    private SQLiteDatabase con;

    private ELocacao locacao;

    private EditText etNumCliente;
    private EditText etNumCarro;
    private EditText etDataLocacao;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_locacao_manutencao);

        etNumCliente = findViewById(R.id.editText3);
        etNumCarro = findViewById(R.id.editText2);
        etDataLocacao = findViewById(R.id.editText);

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setHomeButtonEnabled(true);
        getSupportActionBar().setTitle("Cadastro de Locação");

        SimpleMaskFormatter smfDataLocacao = new SimpleMaskFormatter("NN/NN/NNNN");
        MaskTextWatcher mtwDataLocacao = new MaskTextWatcher(etDataLocacao, smfDataLocacao);
        etDataLocacao.addTextChangedListener(mtwDataLocacao);
    }

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

    public void acaoCadastrar(View view) throws ParseException {
        if(validar_locacao()) {
            locacao = new ELocacao();
            java.util.Date dataInicial = new SimpleDateFormat("dd/MM/yyyy").parse(etDataLocacao.getText().toString());
            SimpleDateFormat formatarData = new SimpleDateFormat("yyyy-MM-dd");
            String dataString = formatarData.format(dataInicial);
            java.sql.Date dataConvertida = java.sql.Date.valueOf(dataString);

            //Toast.makeText(this, dataConvertida.toString(), Toast.LENGTH_LONG).show();

            locacao.setIdCliente(Integer.parseInt(etNumCliente.getText().toString()));
            locacao.setIdCarro(Integer.parseInt(etNumCarro.getText().toString()));
            locacao.setDataLocacao(dataConvertida);
            inserirLocacao();
        }
    }

    public void inserirLocacao() {
        bd = new Banco(this);
        try {
            con = bd.getWritableDatabase();
            ContentValues values = new ContentValues();
            values.put("idCliente", locacao.getIdCliente());
            values.put("idCarro", locacao.getIdCarro());
            values.put("dataLocacao", locacao.getDataLocacao().toString());
            con.insertOrThrow("locacao", null, values);
            con.close();
            Toast.makeText(this, "Salvo com Sucesso!", Toast.LENGTH_LONG).show();
        } catch (android.database.SQLException e) {
            Toast.makeText(this, "Erro: !" + e.getMessage(), Toast.LENGTH_LONG).show();
        }
    }

    public boolean validar_locacao() {
        if(!validar_cliente()) {
            if(!validar_carro()) {
                if(!validar_data()) {
                    return true;
                } else {
                    Toast.makeText(this, "Data inválida!", Toast.LENGTH_LONG).show();
                    etDataLocacao.requestFocus();
                    return false;
                }
            } else {
                Toast.makeText(this, "Carro inválido!", Toast.LENGTH_LONG).show();
                etNumCarro.requestFocus();
                return false;
            }
        } else {
            Toast.makeText(this, "Cliente inválido!", Toast.LENGTH_LONG).show();
            etNumCliente.requestFocus();
            return false;
        }
    }

    public boolean validar_cliente() {
        return TextUtils.isEmpty(etNumCliente.getText());
    }

    public boolean validar_carro() {
        return TextUtils.isEmpty(etNumCarro.getText());
    }

    public boolean validar_data() {
        return TextUtils.isEmpty(etDataLocacao.getText());
    }
}
