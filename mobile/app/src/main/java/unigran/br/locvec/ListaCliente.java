package unigran.br.locvec;

import android.content.Intent;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
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
import unigran.br.locvec.Entidades.ECliente;
import unigran.br.locvec.Entidades.EVeiculo;

public class ListaCliente extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    static boolean active = false;
    private SQLiteDatabase db;
    private Banco banco;

    @Override
    public void onStart() {
        super.onStart();
        active = true;
        //criando lista
        List<ECliente> clientes = new LinkedList<>();
        clientes = listaTodos();
        System.out.println(clientes.toString());
        ListView listacliente = (ListView) findViewById(R.id.listaCliente); //mapeando lista
        ArrayAdapter<ECliente> adapter = new ArrayAdapter<>(this, android.R.layout.simple_list_item_1, clientes);
        listacliente.setAdapter(adapter);

        //selecionar item da lista pra editar
        listacliente.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                String codigo;
                codigo = position+"";

                //cursor.moveToPosition(position);
                //codigo = cursor.getString(cursor.getColumnIndexOrThrow(CriaBanco.ID));
                Intent intent = new Intent(ListaCliente.this, ClienteManutencao.class);
                intent.putExtra("codigo", codigo);
                Toast.makeText(getApplicationContext(), "ID: " + position, Toast.LENGTH_SHORT).show();
                startActivity(intent);
                //finish();

            }
        });

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
        setContentView(R.layout.activity_lista_cliente);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);



        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);
    }

    public void clickBtnCadastrar(View view){
        Intent it = new Intent(ListaCliente.this, ClienteManutencao.class);
        startActivity(it);
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
            Intent it = new Intent(ListaCliente.this, ListaLocacao.class);
            startActivity(it);
        } else if (id == R.id.nav_clientes) {
            if(active){

            }else{
                Intent it = new Intent(ListaCliente.this, ListaCliente.class);
                startActivity(it);
            }
        } else if (id == R.id.nav_carros) {
            Intent it = new Intent(ListaCliente.this, ListaVeiculo.class);
            startActivity(it);
        } else if (id == R.id.nav_relatorios) {
            Intent it = new Intent(ListaCliente.this, Relatorios.class);
            startActivity(it);

        } else if (id == R.id.nav_funcionarios) {
            Intent it = new Intent(ListaCliente.this, Funcionario.class);
            startActivity(it);
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
    public List listaTodos(){

        banco = new Banco(this);
        db = banco.getReadableDatabase();
        List cliente = new LinkedList();
        Cursor res =
                db.rawQuery("SELECT * FROM cliente",null);
        if(res.getCount()>0){
            res.moveToFirst();
            do{
                ECliente ecli = new ECliente();
                ecli.setId(res.getInt(res.getColumnIndexOrThrow("id")));
                ecli.setNome(res.getString(res.getColumnIndexOrThrow("nome")));
                ecli.setCNH(res.getString(res.getColumnIndexOrThrow("cnh")));

                cliente.add("Id: "+ res.getInt(res.getColumnIndexOrThrow("id"))
                                + "\n" +"Nome: "+ res.getString(res.getColumnIndexOrThrow("nome"))
                                + "\n" +"CPF: "+ res.getString(res.getColumnIndexOrThrow("cpf")));




            }while (res.moveToNext());
        }




        db.close();
        return cliente;
    }
}
