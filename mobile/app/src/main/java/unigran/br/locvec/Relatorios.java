package unigran.br.locvec;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.ArrayAdapter;
import android.widget.EditText;
import android.widget.Spinner;

import unigran.br.locvec.Máscaras.MáscaraCampoData;

public class Relatorios extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

        Spinner tipoRelatorio;
        EditText dataInicial, dataFinal;

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

        // TIPOS DE RELATORIO

        tipoRelatorio = (Spinner) findViewById(R.id.tipoRelatorio);

        ArrayAdapter adapter = ArrayAdapter.createFromResource(this, R.array.tiposRelatorio, android.R.layout.simple_spinner_item);
        tipoRelatorio.setAdapter(adapter);

        // FIM TIPOS DE RELATORIO

        // MASCARA PARA DATA INICIAL E FINAL
        dataInicial = (EditText) findViewById(R.id.edDataInicial);
        new MáscaraCampoData(dataInicial);

        dataFinal = (EditText) findViewById(R.id.edDataFinal);
        new MáscaraCampoData(dataFinal);



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
        getMenuInflater().inflate(R.menu.relatorios, menu);
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
            Intent it = new Intent(Relatorios.this, Main.class);
            startActivity(it);
        } else if (id == R.id.nav_clientes) {

        } else if (id == R.id.nav_carros) {

        } else if (id == R.id.nav_relatorios) {
            Intent it = new Intent(Relatorios.this, Relatorios.class);
            startActivity(it);

        } else if (id == R.id.nav_relatorios) {

        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
}
