package unigran.br.locvec.DAO;

import android.content.ContentValues;
import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import unigran.br.locvec.Entidades.EFuncionario;

public class DaoFuncionario extends SQLiteOpenHelper {

    private static final String DATEBASE = "locar";
    private static final int VERSION = 1;

    public DaoFuncionario(Context context) {
        super(context, DATEBASE, null, VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase sqLiteDatabase) {
    }

    @Override
    public void onUpgrade(SQLiteDatabase sqLiteDatabase, int i, int i1) {
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
