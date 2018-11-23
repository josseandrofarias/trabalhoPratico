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
    private static final String DATEBASE = "locar";
    private static final int VERSION = 1;

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
                "dataAdmissao varchar(8) DEFAULT NULL," +
                "dataDemissao varchar(8) DEFAULT NULL);";
        db.execSQL(cSql);
    }

    @Override
    public void onUpgrade(SQLiteDatabase sqLiteDatabase, int i, int i1) {
    }

    public List listaTodos(){
        db = getReadableDatabase();
        List funcionarios = new LinkedList();
        Cursor res = db.rawQuery("select * from funcionario",null); // "SELECT * FROM funcionario",null
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

    public void abreConexao(){
        db = getWritableDatabase();
    }
    public void fechaConexao(){
        db.close();
    }

    public String salvarFuncionario(EFuncionario eFunc) {
        ContentValues values = new ContentValues();
        long resultado;
        values.put("nome", eFunc.getvNome());
        values.put("cpf", eFunc.getvCPF());
        values.put("rg", eFunc.getvRG());
        values.put("senha", eFunc.getvSenha());
        values.put("endereco", eFunc.getvEndereco());
        values.put("cargo", eFunc.getvCargo());
        values.put("deativado", eFunc.getvFlagDesativado());
        values.put("supervisor", eFunc.getvFlagSupervisor());
        values.put("dataAdmissao", eFunc.getvAdmissao());
        values.put("dataDemissao", eFunc.getvDemissao());
        resultado = db.insert("funcionario" , null, values);

        try {
            db.execSQL("insert into funcionario (nome, cpf, rg, senha, endereco, cargo, deativado, supervisor, dataAdmissao, dataDemissao) " +
                    "values ('" +eFunc.getvNome()+ "'" + ",'" + eFunc.getvCPF()+ ",'" + eFunc.getvRG()+ ",'" + eFunc.getvSenha()+
                    ",'" + eFunc.getvEndereco()+ ",'" + eFunc.getvCargo()+ ",'" + eFunc.getvFlagDesativado()+ ",'" +
                    ",'" + eFunc.getvAdmissao()+ ",'" + eFunc.getvDemissao()+"')");

        } catch (Exception e) {
            e.printStackTrace();
        }

        db.close();
        if (resultado ==-1) {
            return "Erro ao cadastrar!";
        }
        else{
            return "Cadastrado!";
        }

    }
}
