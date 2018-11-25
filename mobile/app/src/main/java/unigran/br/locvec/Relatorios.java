package unigran.br.locvec;

import android.content.Intent;
import android.database.Cursor;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
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
import android.widget.ListView;
import android.widget.Spinner;
import android.widget.Toast;
import unigran.br.locvec.DAO.Banco;

import java.util.LinkedList;
import java.util.List;

import locvec.unigran.br.locvec.R;
import unigran.br.locvec.Entidades.EFuncionario;
import unigran.br.locvec.Entidades.ELocacao;
import unigran.br.locvec.Entidades.EVeiculo;
import unigran.br.locvec.Entidades.ECliente;


public class Relatorios extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    Spinner tipoRelatorio;
    Button btGerar;
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

            case "Selecione o tipo de relatório":

                ArrayAdapter<String> selecione = new ArrayAdapter<>(this, android.R.layout.simple_list_item_1, listaRelatorio("selecione"));
                listRelatorio.setAdapter(selecione);

                break;

            case "Carros":

                ArrayAdapter<EVeiculo> arrayAdapter = new ArrayAdapter<EVeiculo>(this, android.R.layout.simple_list_item_1, listaRelatorio("carro"));
                listRelatorio.setAdapter(arrayAdapter);

                break;
            case "Locações":
                ArrayAdapter<ELocacao> eLocacaoArrayAdapter = new ArrayAdapter<ELocacao>(this, android.R.layout.simple_list_item_1, listaRelatorio("locacao"));
                listRelatorio.setAdapter(eLocacaoArrayAdapter);

                break;
            case "Clientes":
                // CASO ESTEJA COMENTADO É PORQUE O INTEGRANTE DO GRUPO NÃO TERMINOU SUA PARTE
                ArrayAdapter<ECliente> eClienteArrayAdapter = new ArrayAdapter<ECliente>(this, android.R.layout.simple_list_item_1, listaRelatorio("cliente"));
                listRelatorio.setAdapter(eClienteArrayAdapter);

                break;
            case "Funcionários":
                ArrayAdapter<EFuncionario> eFuncionarioArrayAdapter = new ArrayAdapter<EFuncionario>(this, android.R.layout.simple_list_item_1, listaRelatorio("funcionario"));
                listRelatorio.setAdapter(eFuncionarioArrayAdapter);
                break;

        }

    }

    //APÓS VERIFICAR O TIPO SELECIONADO É FEITA A CONSULTA NO BANCO E LOGO EM SEGUIDA A LISTAGEM
    public List listaRelatorio(String tipo){
        conexao = bd.getReadableDatabase();
        List dados = new LinkedList();
        Cursor res;
        switch (tipo){

            case "selecione":

                AlertDialog.Builder msg = new AlertDialog.Builder(this);
                msg.setTitle("Tipo não selecionado");
                msg.setMessage("Selecione um tipo de relatório para continuar!");
                msg.setNeutralButton("Ok" ,null);
                msg.show();

                break;

            case "carro":
                conexao = bd.getReadableDatabase();
                  res = conexao.rawQuery("SELECT * FROM carro",null);

                if(res.getCount()>0){
                    res.moveToFirst();
                    do{
                        EVeiculo eveic = new EVeiculo();
                        eveic.setId(res.getInt(res.getColumnIndexOrThrow("id")));
                        eveic.setNome(res.getString(res.getColumnIndexOrThrow("nome")));
                        eveic.setMarca(res.getString(res.getColumnIndexOrThrow("marca")));
                        eveic.setModelo(res.getString(res.getColumnIndexOrThrow("modelo")));
                        eveic.setPlaca(res.getString(res.getColumnIndexOrThrow("placa")));
                        eveic.setValorSeguro(res.getFloat(res.getColumnIndexOrThrow("valorSeguro")));
                        eveic.setValorLocacao(res.getFloat(res.getColumnIndexOrThrow("valorLocacao")));
                        eveic.setCor(res.getString(res.getColumnIndexOrThrow("cor")));
                        dados.add("Id: "+eveic.getId()
                                + "\n" +"Nome: "+ eveic.getNome()
                                + "\n" +"Marca: "+ eveic.getMarca()
                                + "\n" +"Modelo: "+ eveic.getModelo()
                                + "\n" +"Placa: "+ eveic.getPlaca()
                                + "\n" +"Valor Locação: "+ eveic.getValorLocacao()
                                + "\n" +"Valor Seguro: "+ eveic.getValorSeguro());
                    }while (res.moveToNext());
                }else
                    msgErroGerar();

                break;


            case "cliente":
                res = conexao.rawQuery("SELECT * FROM cliente",null);
                if(res.getCount()>0){
                    res.moveToFirst();
                    do{
                        // CASO ESTEJA COMENTADO É PORQUE O INTEGRANTE DO GRUPO NÃO TERMINOU SUA PARTE



//                        ECliente eCliente = new ECliente();
//                        eCliente.setId(res.getInt(res.getColumnIndexOrThrow("id")));
//                        eCliente.setNome(res.getString(res.getColumnIndexOrThrow("nome")));
//                        eCliente.setCpf(res.getString(res.getColumnIndexOrThrow("cpf")));
//                        eCliente.setRg(res.getString(res.getColumnIndexOrThrow("rg")));
//                        eCliente.setCnh(res.getString(res.getColumnIndexOrThrow("cnh")));
//                        eCliente.setEndereco(res.getString(res.getColumnIndexOrThrow("endereco")));
//                        eCliente.setNumeroDependentes(res.getInt(res.getColumnIndexOrThrow("numeroDependentes")));
//                        dados.add("Id: "+eCliente.getId()
//                                + "\n" +"Nome: "+ eCliente.getNome()
//                                + "\n" +"CPF: "+ eCliente.getCpf()
//                                + "\n" +"RG: "+ eCliente.getRg()
//                                + "\n" +"Endereço: "+ eCliente.getEndereco()
//                                + "\n" +"N. Dependentes: "+ eCliente.getNumeroDependentes());
                    }while (res.moveToNext());
                }else
//                    msgErroGerar();
                    msgIntegranteNaoFez();
                break;

            case "funcionario":
                res = conexao.rawQuery("SELECT * FROM funcionario",null);
                if(res.getCount()>0){
                    res.moveToFirst();
                    do{
                        EFuncionario eFuncionario = new EFuncionario();
                        eFuncionario.setId(res.getInt(res.getColumnIndexOrThrow("id")));
                        eFuncionario.setvNome(res.getString(res.getColumnIndexOrThrow("nome")));
                        eFuncionario.setvCPF(res.getString(res.getColumnIndexOrThrow("cpf")));
                        eFuncionario.setvRG(res.getString(res.getColumnIndexOrThrow("rg")));
                        eFuncionario.setvEndereco(res.getString(res.getColumnIndexOrThrow("endereco")));
                        dados.add("Id: "+eFuncionario.getId()
                                + "\n" +"Nome: "+ eFuncionario.getvNome()
                                + "\n" +"CPF: "+ eFuncionario.getvCPF()
                                + "\n" +"RG: "+ eFuncionario.getvRG()
                                + "\n" +"Endereço: "+ eFuncionario.getvEndereco());
                    }while (res.moveToNext());
                }else
                    msgErroGerar();
                break;

            case "locacao":
                res = conexao.rawQuery("SELECT * FROM locacao",null);
                if(res.getCount()>0){
                    res.moveToFirst();
                    do{
                        ELocacao eLocacao = new ELocacao();
                        eLocacao.setId(res.getInt(res.getColumnIndexOrThrow("id")));
                          eLocacao.setQuilometragem(res.getFloat(res.getColumnIndexOrThrow("quilometragem")));
                        dados.add("Id: "+eLocacao.getId()
                                + "\n" +"Id Cliente: "+ eLocacao.getIdCliente()
                                + "\n" +"Id Carro: "+ eLocacao.getIdCarro()
                                + "\n" +"Km: "+ eLocacao.getQuilometragem());
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

    private void msgIntegranteNaoFez(){
        AlertDialog.Builder msg = new AlertDialog.Builder(this);
        msg.setTitle("Erro");
        msg.setMessage("Outro integrante do grupo não fez sua parte!");
        msg.setNeutralButton("Ok" ,null);
        msg.show();
    }
}
