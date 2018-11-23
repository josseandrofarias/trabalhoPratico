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
import android.widget.ArrayAdapter;
import android.widget.ListAdapter;
import android.widget.ListView;

import java.util.ArrayList;

import locvec.unigran.br.locvec.R;
import unigran.br.locvec.DAO.Banco;

public class ListaLocacao extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    static boolean active = false;

    private static final String TAG = "ListDataActivity";
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
        Log.d(TAG,"populateListView: Displaying data in the ListView");
        Cursor data = selecionarLocacoes();
        ArrayList<String> listaLocacoes = new ArrayList<>();
        while(data.moveToNext()) {
            listaLocacoes.add("ID do Cliente: " + data.getString(data.getColumnIndex("idCliente")) + "\n" +
            "ID do Veículo: " + data.getString(data.getColumnIndex("idCarro")) + "\n" +
            "Data de Locação: " + data.getString(data.getColumnIndex("dataLocacao")));
        }
        ListAdapter adapter = new ArrayAdapter<>(this,android.R.layout.simple_list_item_1, listaLocacoes);
        mListView.setAdapter(adapter);
    }

    public Cursor selecionarLocacoes() {
        bd = new Banco(this);
        con = bd.getWritableDatabase();
        String query = "SELECT * FROM locacao";
        Cursor data = con.rawQuery(query, null);
        return data;
    }

    // SELECT locacao.dataLocacao, locacao.dataDevolucao, locacao.quilometragem
    // FROM ((locacao
    // INNER JOIN cliente ON locacao.idCliente = cliente.id)
    // INNER JOIN cliente ON locacao.idCarro = carro.id);

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
