package unigran.br.locvec;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
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

import locvec.unigran.br.locvec.R;
import unigran.br.locvec.DAO.DaoFuncionario;

public class Funcionario extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    static boolean active = false;
    private RecyclerView recyclerView;
    //private PessoaAdapter pessoaAdapter;

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


        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);

        recyclerView= findViewById(R.id.listFuncinarios);
        DaoFuncionario daoFunc = new DaoFuncionario(this);
        daoFunc.abreConexao();

//        LinearLayoutManager linearLayout = new LinearLayoutManager(this);
//        recyclerView.setLayoutManager(linearLayout);
//        pessoaAdapter = new PessoaAdapter(DaoFuncionario.l());
//        recyclerView.setAdapter(pessoaAdapter);
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
