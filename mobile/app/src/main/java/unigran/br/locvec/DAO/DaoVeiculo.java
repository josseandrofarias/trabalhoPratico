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
    private Banco banco;
    private static final String DATEBASE = "locar";
    private static final int VERSION = 1;



    public DaoVeiculo(Context context) {
        super(context, DATEBASE, null, VERSION);

    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        String cSql = "CREATE TABLE IF NOT EXISTS carro(" +
                "id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, " +
                "placa varchar(7) ," +
                "nome varchar(50) ," +
                "modelo varchar(50) ," +
                "valorSeguro float ," +
                "valorLocacao float ," +
                "cor varchar(50) ," +
                "ativo boolean ," +
                "marca varchar(50) ," +
                "dataCad date DEFAULT NULL);";

        db.execSQL(cSql);
    }

    @Override
    public void onUpgrade(SQLiteDatabase sqLiteDatabase, int i, int i1) {
    }


    public void abreConexao(){
        db = getWritableDatabase();
    }
    public void fechaConexao(){
        db.close();
    }




    public List listaTodos(){
        db = getReadableDatabase();
        List veiculo = new LinkedList();
        Cursor res =
                db.rawQuery("SELECT * FROM carro",null);
        if(res.getCount()>0){
            res.moveToFirst();
            do{
                EVeiculo eveic = new EVeiculo();
                eveic.setMarca(res.getString(res.getColumnIndexOrThrow("marca")));
                eveic.setModelo(res.getString(res.getColumnIndexOrThrow("modelo")));
                eveic.setPlaca(res.getString(res.getColumnIndexOrThrow("placa")));
                veiculo.add(eveic);
            }while (res.moveToNext());
        }
        db.close();
        return veiculo;
    }


    public String salvarVeiculo(EVeiculo eVeiculo) {

        try{
            abreConexao();
            ContentValues values = new ContentValues();
            long resultado;
            values.put("nome",eVeiculo.getNome());
            values.put("placa",eVeiculo.getPlaca());
            values.put("modelo",eVeiculo.getModelo());
            values.put("valorSeguro",eVeiculo.getValorSeguro());
            values.put("valorLocacao",eVeiculo.getValorLocacao());
            values.put("cor",eVeiculo.getCor());
            values.put("ativo", true);
            values.put("marca",eVeiculo.getMarca());
            //values.put ("dataCad",eVeiculo.getDataCad().toString());
            resultado = db.insert("carro" , null, values);

            try {
                //db.execSQL("insert into carro (nome) values ('fiat')");
                db.execSQL("insert into carro (nome, placa) " +
                        "values ('" +eVeiculo.getNome()+ "'" + ",'" + eVeiculo.getPlaca()+      "')");

            } catch (Exception e) {
                e.printStackTrace();
            }

            db.close();
            if (resultado ==-1) {
                return "Erro ao inserir registro";
            }
            else{
                return "Registro Inserido com sucesso";
            }






        }catch (Error e){
            System.out.println("erro" + e.getMessage());

        }

        return "Registro Inserido com sucesso";
    }
}
