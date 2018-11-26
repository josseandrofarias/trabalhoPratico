package unigran.br.locvec.DAO;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import java.util.LinkedList;
import java.util.List;

import unigran.br.locvec.Entidades.EFuncionario;

public class DaoFuncionario extends SQLiteOpenHelper {

    private SQLiteDatabase db;
    private Banco banco;
    Cursor cursor;
    private static final String DATEBASE = "dbLocar";
    private static final int VERSION = 1;
    private String vTempSituacao;

    public DaoFuncionario(Context context) {
        super(context, DATEBASE, null, VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        String cSql = "CREATE TABLE IF NOT EXISTS funcionario(" +
                "id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL," +
                "nome varchar(50) NOT NULL," +
                "cpf varchar(11) NOT NULL," +
                "rg varchar(15) NOT NULL," +
                "senha varchar(20) NOT NULL," +
                "endereco varchar(150) NOT NULL," +
                "cargo varchar(30) NOT NULL," +
                "deativado integer(1) NOT NULL," +
                "supervisor integer(1) NOT NULL," +
                "dataAdmissao varchar(10) DEFAULT NULL," +
                "dataDemissao varchar(10) DEFAULT NULL);";
        db.execSQL(cSql);
    }

    @Override
    public void onUpgrade(SQLiteDatabase sqLiteDatabase, int i, int i1) {
    }

    public List listaTodos(){
        db = getReadableDatabase();
        List funcionarios = new LinkedList();
        Cursor res = db.rawQuery("select * from funcionario",null);
        if(res.getCount()>0){
            res.moveToFirst();
            do{
                EFuncionario efunc = new EFuncionario();
                efunc.setvNome(res.getString(res.getColumnIndexOrThrow("nome")));
                efunc.setvFlagDesativado(res.getInt(res.getColumnIndexOrThrow("deativado")));
                if (efunc.getvFlagDesativado()==0) {
                    vTempSituacao = "Ativo";
                }else {
                    vTempSituacao = "Inativo";
                }
                funcionarios.add(efunc.getvNome().toString() + " - " + vTempSituacao);
            }while (res.moveToNext());
        }
        db.close();
        return funcionarios;
    }

    public void abreConexao(){
        db = getWritableDatabase();
    }
    public void fechaConexao(){
        db.close();
    }

}
