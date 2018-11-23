package unigran.br.locvec.DAO;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.support.annotation.Nullable;

public class Banco extends SQLiteOpenHelper {

    public static final String TCarro = "carro";
    public static final String TCliente = "cliente";
    public static final String TFuncionario = "funcionario";
    public static final String TLocacao = "locacao";

    public Banco(Context context) {
        super(context, "dbLocar", null, 1);
    }


    @Override
    public void onCreate(SQLiteDatabase db) {
        String sqlCarro ="CREATE TABLE IF NOT EXISTS "+TCarro+"(" +
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

        String sqlCliente = "CREATE TABLE IF NOT EXISTS "+TCliente+"(" +
                "id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL," +
                "nome varchar(50) NOT NULL," +
                "cpf varchar(11) NOT NULL," +
                "rg varchar(15) NOT NULL," +
                "cnh varchar(15) NOT NULL," +
                "endereco varchar(150) NOT NULL," +
                "numeroDependentes int(11) NOT NULL," +
                "dataCad date NOT NULL);";

        String sqlFuncionario = "CREATE TABLE IF NOT EXISTS "+TFuncionario+"(" +
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

        String sqlLocacao = "CREATE TABLE IF NOT EXISTS "+TLocacao+"(" +
                "id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL," +
                "dataLocacao date NOT NULL," +
                "dataDevolucao date ," +
                "quilometragem float ," +
                "idCliente INTEGER NOT NULL," +
                "idCarro INTEGER NOT NULL," +
                "FOREIGN KEY(idCarro) REFERENCES carro(id)," +
                "FOREIGN KEY(idCliente) REFERENCES cliente(id));";
        db.execSQL(sqlCarro);
        db.execSQL(sqlCliente);
        db.execSQL(sqlFuncionario);
        db.execSQL(sqlLocacao);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {

    }
}
