package unigran.br.locvec;

import android.content.Intent;
import android.database.Cursor;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.os.Bundle;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.Spinner;
import android.widget.Toast;
import unigran.br.locvec.DAO.Banco;

import java.util.ArrayList;
import java.util.LinkedList;
import java.util.List;

import locvec.unigran.br.locvec.R;
import unigran.br.locvec.DAO.DaoVeiculo;
import unigran.br.locvec.Entidades.EFuncionario;
import unigran.br.locvec.Entidades.ELocacao;
import unigran.br.locvec.Entidades.EVeiculo;
//import unigran.br.locvec.Entidades.ECliente;
import unigran.br.locvec.Utilitarios.MáscaraCampoData;


public class Relatorios extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    Spinner tipoRelatorio;
    Button btGerar;
    EditText dataInicial, dataFinal;
    static boolean active = false;
    Banco bd;
    private ListView listRelatorio;
    private SQLiteDatabase conexao;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_relatorios);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();
        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);

        conexaoDB();

        // Metodos para escolher o tipo do relatorio
        tipoRelatorio = (Spinner) findViewById(R.id.tipoRelatorio);
        ArrayAdapter adapter = ArrayAdapter.createFromResource(this, R.array.tiposRelatorio, android.R.layout.simple_spinner_item);
        tipoRelatorio.setAdapter(adapter);

        // Metodos para aplicar mascaras aos campos de data
        dataInicial = (EditText) findViewById(R.id.edDataInicial);
        new MáscaraCampoData(dataInicial);
        dataFinal = (EditText) findViewById(R.id.edDataFinal);
        new MáscaraCampoData(dataFinal);

        btGerar = (Button) findViewById(R.id.btGerar);
        listRelatorio = (ListView) findViewById(R.id.listRelatorio);


    }
    // CONECTANDO NO BANCO
    private void conexaoDB(){
        try {
            bd = new Banco(this);
            Toast.makeText(this, "Conexão Ok", Toast.LENGTH_SHORT).show();
        }catch (SQLException ex) {
            AlertDialog.Builder msg = new AlertDialog.Builder(this);
            msg.setTitle("Erro");
            msg.setMessage("Erro de Conexao");
            msg.setNeutralButton("Ok", null);
            msg.show();
        }
    }

    @Override
    protected void onResume() {
        super.onResume();


    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();

        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @Override
    public void onStart() {
        super.onStart();
        active = true;
    }

    @Override
    public void onStop() {
        super.onStop();
        active = false;
        finishAffinity();
    }
    // MENU LATERAL
    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.nav_locacao) {
            Intent it = new Intent(Relatorios.this, ListaLocacao.class);
            startActivity(it);
        } else if (id == R.id.nav_clientes) {
            Intent it = new Intent(Relatorios.this, ListaCliente.class);
            startActivity(it);
        } else if (id == R.id.nav_carros) {
            Intent it = new Intent(Relatorios.this, ListaVeiculo.class);
            startActivity(it);
        } else if (id == R.id.nav_relatorios) {
            if(active){

            }else{
                Intent it = new Intent(Relatorios.this, Relatorios.class);
                startActivity(it);
            }

        } else if (id == R.id.nav_funcionarios) {
            Intent it = new Intent(Relatorios.this, Funcionario.class);
            startActivity(it);
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }


    // AO CLICAR NO BOTÃO SERÁ VERIFICADO O TIPO DE RELATORIO SELECIONADO
    public void clickBtnGerar(View view) {

        switch ((String) tipoRelatorio.getSelectedItem()){

            case "Carros":

                ArrayAdapter<EVeiculo> arrayAdapter = new ArrayAdapter<EVeiculo>(this, android.R.layout.simple_list_item_1, listaRelatorio("carro"));
                listRelatorio.setAdapter(arrayAdapter);

                Toast.makeText(this, ""+tipoRelatorio.getSelectedItem()+" "+dataInicial.getText()+" "+dataFinal.getText(), Toast.LENGTH_SHORT).show();
                break;
            case "Locações":
                ArrayAdapter<ELocacao> eLocacaoArrayAdapter = new ArrayAdapter<ELocacao>(this, android.R.layout.simple_list_item_1, listaRelatorio("locacao"));
                listRelatorio.setAdapter(eLocacaoArrayAdapter);

                Toast.makeText(this, "Locações", Toast.LENGTH_SHORT).show();
                break;
            case "Clientes":
//                ArrayAdapter<ECliente> eClienteArrayAdapter = new ArrayAdapter<ECliente>(this, android.R.layout.simple_list_item_1, listaRelatorio("cliente"));
//                listRelatorio.setAdapter(eClienteArrayAdapter);
                Toast.makeText(this, "Clientes", Toast.LENGTH_SHORT).show();
                break;
            case "Funcionários":
                ArrayAdapter<EFuncionario> eFuncionarioArrayAdapter = new ArrayAdapter<EFuncionario>(this, android.R.layout.simple_list_item_1, listaRelatorio("funcionario"));
                listRelatorio.setAdapter(eFuncionarioArrayAdapter);
                Toast.makeText(this, "Funcionario", Toast.LENGTH_SHORT).show();
                break;

        }

    }

    //APÓS VERIFICAR O TIPO SELECIONADO É FEITA A CONSULTA NO BANCO E LOGO EM SEGUIDA A LISTAGEM
    public List listaRelatorio(String tipo){
        conexao = bd.getReadableDatabase();
        List dados = new LinkedList();
        Cursor res;
        switch (tipo){
            case "carro":

                 res = conexao.rawQuery("SELECT * FROM carro WHERE dataCad >= "+dataInicial+" && dataCad <= "+ dataFinal,null);
                if(res.getCount()>0){
                    res.moveToFirst();
                    do{
                        EVeiculo eveic = new EVeiculo();
                        eveic.setId(res.getInt(res.getColumnIndexOrThrow("ID")));
                        eveic.setNome(res.getString(res.getColumnIndexOrThrow("NOME")));
                        eveic.setModelo(res.getString(res.getColumnIndexOrThrow("MODELO")));
                        eveic.setPlaca(res.getString(res.getColumnIndexOrThrow("PLACA")));
                        eveic.setValorSeguro(res.getFloat(res.getColumnIndexOrThrow("SEGURO")));
                        eveic.setValorLocacao(res.getFloat(res.getColumnIndexOrThrow("LOCAÇÃO")));
                        eveic.setCor(res.getString(res.getColumnIndexOrThrow("COR")));
                        eveic.setMarca(res.getString(res.getColumnIndexOrThrow("MARCA")));
                        dados.add(eveic);
                    }while (res.moveToNext());
                }else
                    msgErroGerar();
                break;


            case "cliente":
                res = conexao.rawQuery("SELECT * FROM cliente WHERE dataCad >= "+dataInicial+" && dataCad <= "+ dataFinal,null);
                if(res.getCount()>0){
                    res.moveToFirst();
                    do{
//                        ECliente eCliente = new ECliente();
//                        eCliente.setId(res.getInt(res.getColumnIndexOrThrow("ID")));
//                        eCliente.setNome(res.getString(res.getColumnIndexOrThrow("NOME")));
//                        eCliente.setCpf(res.getString(res.getColumnIndexOrThrow("CPF")));
//                        eCliente.setRg(res.getString(res.getColumnIndexOrThrow("RG")));
//                        eCliente.setCnh(res.getString(res.getColumnIndexOrThrow("CNH")));
//                        eCliente.setEndereco(res.getString(res.getColumnIndexOrThrow("ENDEREÇO")));
//                        eCliente.setNumeroDependentes(res.getInt(res.getColumnIndexOrThrow("DEPENDENTES")));
//                        dados.add(eCliente);
                    }while (res.moveToNext());
                }else
                    msgErroGerar();
                break;

            case "funcionario":
                res = conexao.rawQuery("SELECT * FROM funcionario WHERE dataAdmissao >= "+dataInicial+" && dataAdmissao <= "+ dataFinal,null);
                if(res.getCount()>0){
                    res.moveToFirst();
                    do{
                        EFuncionario eFuncionario = new EFuncionario();
                        eFuncionario.setId(res.getInt(res.getColumnIndexOrThrow("ID")));
                        eFuncionario.setvNome(res.getString(res.getColumnIndexOrThrow("NOME")));
                        eFuncionario.setvCPF(res.getString(res.getColumnIndexOrThrow("CPF")));
                        eFuncionario.setvRG(res.getString(res.getColumnIndexOrThrow("RG")));
                        eFuncionario.setvEndereco(res.getString(res.getColumnIndexOrThrow("ENDERECO")));
//                        eFuncionario.setvAdmissao(res.getString(res.getColumnIndexOrThrow("DATA ADMISSAO")));
//                        eFuncionario.setvDemissao(res.getString(res.getColumnIndexOrThrow("DATA DEMISSAO")));
                        dados.add(eFuncionario);
                    }while (res.moveToNext());
                }else
                    msgErroGerar();
                break;

            case "locacao":
                res = conexao.rawQuery("SELECT a.id, a.dataLocacao, a.dataDevolucao, a.quilometragem, b.nome, b.cnh, c.nome, c.placa FROM locacao AS a INNER JOIN cliente b ON a.idCliente = b.id INNER JOIN carro c ON c.id = a.idCarro",null);
                if(res.getCount()>0){
                    res.moveToFirst();
                    do{
                        ELocacao eLocacao = new ELocacao();
                        eLocacao.setId(res.getInt(res.getColumnIndexOrThrow("ID")));
//                        eLocacao.setDataLocacao(res.getString(res.getColumnIndexOrThrow("DATA LOCAÇÃO")));
//                        eLocacao.setDataDevolucao(res.getString(res.getColumnIndexOrThrow("DATA DEVOLUÇÃO")));
                        eLocacao.setQuilometragem(res.getFloat(res.getColumnIndexOrThrow("QUILOMETRAGEM")));
//                        eLocacao.setNome(res.getString(res.getColumnIndexOrThrow("NOME")));
//                        eLocacao.setCnh(res.getString(res.getColumnIndexOrThrow("CNH")));
//                        eLocacao.setNome(res.getString(res.getColumnIndexOrThrow("CARRO")));
//                        eLocacao.setPlaca(res.getString(res.getColumnIndexOrThrow("PLACA")));
                        dados.add(eLocacao);
                    }while (res.moveToNext());
                }else
                    msgErroGerar();
                break;


        }
                conexao.close();
                return dados;


    }

    private void msgErroGerar(){
        AlertDialog.Builder msg = new AlertDialog.Builder(this);
        msg.setTitle("Erro");
        msg.setMessage("Não possui dados Cadastrados!");
        msg.setNeutralButton("Ok" ,null);
        msg.show();
    }
}
