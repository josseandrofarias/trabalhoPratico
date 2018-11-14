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
    private static final String DATEBASE = "locar";
    private static final int VERSION = 1;

    public DaoFuncionario(Context context) {
        super(context, DATEBASE, null, VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        String cSql = "CREATE TABLE IF NOT EXISTS funcionario(" +
                "ID INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL," +
                "dataAdmissao date NOT NULL, dataDemissao date DEFAULT NULL," +
                "supervisor tinyint(1) NOT NULL, senha varchar(20) NOT NULL," +
                "endereco varchar(150) DEFAULT NULL, cpf varchar(11) DEFAULT NULL," +
                "rg varchar(15) DEFAULT NULL, cargo varchar(30) DEFAULT NULL," +
                "desativado smallint(6) DEFAULT NULL, nome varchar(50) DEFAULT NULL);";
        db.execSQL(cSql);
    }

    @Override
    public void onUpgrade(SQLiteDatabase sqLiteDatabase, int i, int i1) {
    }

    public void abreConexao(){
        db=getReadableDatabase();
    }
    public void fechaConexao(){
        db.close();
    }

    public List listaTodos(){
        db = getReadableDatabase();
        List funcionarios = new LinkedList();
        Cursor res =
                db.rawQuery("SELECT * FROM FUNCIONARIO",null);
        if(res.getCount()>0){
            res.moveToFirst();
            do{
                EFuncionario efunc = new EFuncionario();
                efunc.setvNome(res.getString(res.getColumnIndexOrThrow("Nome")));
                funcionarios.add(efunc);
            }while (res.moveToNext());
        }
        db.close();
        return funcionarios;
    }

    public void salvarFuncionario(EFuncionario eFunc) {
        ContentValues values = new ContentValues();
        values.put("nome",eFunc.getvNome());
        values.put("endereco",eFunc.getvEndereco());
        values.put("cpf",eFunc.getvCPF());
        values.put("rg",eFunc.getvRG());
        values.put("cargo",eFunc.getvCargo());
        values.put("desativado",eFunc.getvFlagDesativado());
        values.put("supervisor",eFunc.getvFlagSupervisor());
        values.put("senha",eFunc.getvSenha());
        //values.put ("dataDemissao",eFunc.getvDemissao());
        values.put("nome",eFunc.getvNome());
    }
}
