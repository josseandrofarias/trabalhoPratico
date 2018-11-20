package unigran.br.locvec.DAO;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.widget.Toast;

import java.util.LinkedList;
import java.util.List;

import unigran.br.locvec.Entidades.EVeiculo;
import unigran.br.locvec.VeiculoManutencao;

public class DaoVeiculo extends SQLiteOpenHelper{

    private SQLiteDatabase db;
    private static final String DATEBASE = "locar";
    private static final int VERSION = 1;

    public DaoVeiculo(Context context) {
        super(context, DATEBASE, null, VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        String cSql = "CREATE TABLE IF NOT EXISTS carro(" +
                "id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, " +
                "placa varchar(7) NOT NULL," +
                "nome varchar(50) NOT NULL," +
                "modelo varchar(50) NOT NULL," +
                "valorSeguro float NOT NULL," +
                "valorLocacao float NOT NULL," +
                "cor varchar(50) NOT NULL," +
                "ativo boolean NOT NULL," +
                "marca varchar(50) NOT NULL," +
                "dataCad date DEFAULT NULL);";

        db.execSQL(cSql);
    }

    @Override
    public void onUpgrade(SQLiteDatabase sqLiteDatabase, int i, int i1) {
    }


    public void abreConexao(){
        db = getReadableDatabase();
    }
    public void fechaConexao(){
        db.close();
    }




    public List listaTodos(){
        db = getReadableDatabase();
        List funcionarios = new LinkedList();
        Cursor res =
                db.rawQuery("SELECT * FROM carro",null);
        if(res.getCount()>0){
            res.moveToFirst();
            do{
                EVeiculo eveic = new EVeiculo();
                eveic.setNome(res.getString(res.getColumnIndexOrThrow("Nome")));
                funcionarios.add(eveic);
            }while (res.moveToNext());
        }
        db.close();
        return funcionarios;
    }


    public void salvarVeiculo(EVeiculo eVeiculo) {

        try{
            ContentValues values = new ContentValues();
            values.put("nome",eVeiculo.getNome());
            values.put("placa",eVeiculo.getPlaca());
            values.put("modelo",eVeiculo.getModelo());
            values.put("valorSeguro",eVeiculo.getValorSeguro());
            values.put("valorLocacao",eVeiculo.getValorLocacao());
            values.put("cor",eVeiculo.getCor());
            //values.put("ativo");
            values.put("marca",eVeiculo.getMarca());
            values.put ("dataCad",eVeiculo.getDataCad().toString());


        }catch (Error e){


        }


    }
}
