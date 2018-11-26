package unigran.br.locvec;

import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AlertDialog;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.View;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.Toast;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;

import locvec.unigran.br.locvec.R;
import unigran.br.locvec.DAO.Banco;

public class ListaLocacao extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    static boolean active = false;

    Banco bd;
    private SQLiteDatabase con;
    private ListView mListView;

    @Override
    public void onStart() {
        super.onStart();
        active = true;
    }

    @Override
    public void onStop() {
        super.onStop();
        active = false;
        finish();
    }

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lista_locacao);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);

        mListView = (ListView) findViewById(R.id.listView);
        bd = new Banco(this);
        
        criarListView();
    }

    private void criarListView() {
        Cursor data = selecionarLocacoes();
        ArrayList<String> listaLocacoes = new ArrayList<>();
        while(data.moveToNext()) {
            String placa = selecionarCarro(data.getInt(data.getColumnIndex("idCarro")));
            //TRECHO RESPONSAVEL POR TRANSFORMAR A DATA EM PADRÃO DIA/MES/ANO
            SimpleDateFormat entrada = new SimpleDateFormat("yyyy-MM-dd");
            SimpleDateFormat saida = new SimpleDateFormat("dd/MM/yyyy");
            Date dataInicial;
            String dataString = null;
            try {
                dataInicial = entrada.parse(data.getString(data.getColumnIndex("dataLocacao")));
                dataString = saida.format(dataInicial);
            } catch (ParseException e) {
                e.printStackTrace();
            }
            //TRECHO RESPONSAVEL POR TRANSFORMAR A DATA EM PADRÃO DIA/MES/ANO
            listaLocacoes.add("ID da Locação: " + data.getString(data.getColumnIndex("id")) + "\n" +
                    "ID do Cliente: " + data.getString(data.getColumnIndex("idCliente")) + "\n" +
                    "Placa do Veículo: " + placa + "\n" +
                    "Data de Locação: " + dataString);
        }
        ListAdapter adapter = new ArrayAdapter<>(this,android.R.layout.simple_list_item_1, listaLocacoes);
        mListView.setAdapter(adapter);

        mListView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long id) {
                String idLoc = adapterView.getItemAtPosition(i).toString().charAt(15) + ""; //CAPTURANDO O ID DA LOCAÇÃO
                Intent intent = new Intent(ListaLocacao.this, LocacaoGerenciamento.class);
                intent.putExtra("id", Integer.parseInt(idLoc)); //ENVIANDO O ID DA LOCAÇÃO PARA A ACTIVITY DE GERENCIAMENTO
                startActivity(intent);
            }
        });
    }

    public String selecionarCarro(int idCarro) { //FUNÇÃO RETORNA A PLACA DO CARRO VINCULADA A LOCAÇÃO
        bd = new Banco(this);
        con = bd.getWritableDatabase();
        String query = "SELECT placa FROM carro WHERE id=" + idCarro +";";
        Cursor data = con.rawQuery(query, null);
        String placa = null;
        if (data != null && data.moveToFirst()) {
            do {
                placa = data.getString(data.getColumnIndex("placa"));
            } while (data.moveToNext());
        }
        return placa;
    } //FUNÇÃO RETORNA A PLACA DO CARRO VINCULADA A LOCAÇÃO

    public Cursor selecionarLocacoes() { //CAPTURANDO AS LOCAÇÕES NO BANCO
        bd = new Banco(this);
        con = bd.getWritableDatabase();
        String query = "SELECT * FROM locacao";
        Cursor data = con.rawQuery(query, null);
        return data;
    } //CAPTURANDO AS LOCAÇÕES NO BANCO


    public void clickBtnCadLocacao(View view) {
        Intent intent = new Intent(this, LocacaoManutencao.class);
        startActivity(intent);
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

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.nav_locacao) {
            if(active){

            }else{
                Intent it = new Intent(ListaLocacao.this, ListaLocacao.class);
                startActivity(it);
            }
        } else if (id == R.id.nav_clientes) {
            Intent it = new Intent(ListaLocacao.this, ListaCliente.class);
            startActivity(it);
        } else if (id == R.id.nav_carros) {
            Intent it = new Intent(ListaLocacao.this, ListaVeiculo.class);
            startActivity(it);
        } else if (id == R.id.nav_relatorios) {
            Intent it = new Intent(ListaLocacao.this, Relatorios.class);
            startActivity(it);

        } else if (id == R.id.nav_funcionarios) {
            Intent it = new Intent(ListaLocacao.this, Funcionario.class);
            startActivity(it);
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
}
