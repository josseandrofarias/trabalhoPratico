package unigran.br.locvec;

import android.content.Intent;
import android.database.Cursor;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.os.Parcelable;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AlertDialog;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
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
import android.widget.ListView;
import android.widget.Toast;

import java.util.LinkedList;
import java.util.List;

import locvec.unigran.br.locvec.R;
import unigran.br.locvec.DAO.Banco;
import unigran.br.locvec.DAO.DaoFuncionario;
import unigran.br.locvec.Entidades.EFuncionario;

public class Funcionario extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    Banco bd;
    private ListView lista;
    private SQLiteDatabase conexao;
    static boolean active = false;

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
        setContentView(R.layout.activity_funcionario);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        lista = findViewById(R.id.listFuncionario);
        conexaoDB();
        //listar();
        //acoes();

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);
    }

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

    private List listar(){
        conexao = bd.getWritableDatabase();
        List funcionario = new LinkedList();
        Cursor res = conexao.rawQuery("SELECT * FROM funcionario", null);
        Toast.makeText(this, res.getColumnCount(), Toast.LENGTH_SHORT).show();
        if(res.getCount() > 0){
            res.moveToFirst();
            do {
                EFuncionario efunc = new EFuncionario();
                efunc.setvNome(res.getString(res.getColumnIndexOrThrow("nome")));
                //efunc.setvFlagDesativado(res.getWantsAllOnMoveCalls(res.getColumnIndexOrThrow("desativado")));
                funcionario.add(efunc);
            } while (res.moveToNext());
        }
        return funcionario;
    }

    private void acoes() {
        lista.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
                Intent it = new Intent(Funcionario.this, FuncionarioManutencao.class);
                EFuncionario efunc = (EFuncionario)adapterView.getItemAtPosition(i);
                it.putExtra("funcionario", (Parcelable) efunc);
                startActivity(it);
            }
        });
    }

    @Override
    protected void onResume() {
        super.onResume();
        ArrayAdapter<EFuncionario> arrayAdapter = new ArrayAdapter<EFuncionario>(this, android.R.layout.simple_list_item_1, listar());
        lista.setAdapter(arrayAdapter);
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
            Intent it = new Intent(Funcionario.this, ListaLocacao.class);
            startActivity(it);
        } else if (id == R.id.nav_clientes) {
            Intent it = new Intent(Funcionario.this, ListaCliente.class);
            startActivity(it);
        } else if (id == R.id.nav_carros) {
            Intent it = new Intent(Funcionario.this, ListaVeiculo.class);
            startActivity(it);
        } else if (id == R.id.nav_relatorios) {
            Intent it = new Intent(Funcionario.this, Relatorios.class);
            startActivity(it);

        } else if (id == R.id.nav_funcionarios) {
            if(active){

            }else{
                Intent it = new Intent(Funcionario.this, Funcionario.class);
                startActivity(it);
            }
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

    public void acNovoCad(View view){
        Intent it = new Intent(Funcionario.this, FuncionarioManutencao.class);
        startActivity(it);
    }
}
