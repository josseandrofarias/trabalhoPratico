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
import unigran.br.locvec.DAO.DaoVeiculo;
import unigran.br.locvec.Entidades.EVeiculo;

public class ListaVeiculo extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    static boolean active = false;
    private SQLiteDatabase db;
    private Banco banco;

    @Override
    public void onStart() {
        super.onStart();
        active = true;

        //criando lista
        List<EVeiculo> veiculos = new LinkedList<>();
        veiculos = listaTodos();
        System.out.println(veiculos.toString());
        ListView listaveiculo = (ListView) findViewById(R.id.ListaVeiculo); //mapeando lista
        ArrayAdapter<EVeiculo> adapter = new ArrayAdapter<>(this, android.R.layout.simple_list_item_1, veiculos);
        listaveiculo.setAdapter(adapter);

        //selecionar item da lista pra editar
        listaveiculo.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                String codigo;
                codigo = position+"";

                //cursor.moveToPosition(position);
                //codigo = cursor.getString(cursor.getColumnIndexOrThrow(CriaBanco.ID));
                Intent intent = new Intent(ListaVeiculo.this, VeiculoManutencao.class);
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
        //finish(); //Não posso dar finish na tela pois caso eu queira voltar para esta tela o app nao deve ser fechado
    }



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_lista_veiculo);
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

    public void clickBtnVeiculo(View view){
        Intent i = new Intent(this, VeiculoManutencao.class);
        startActivityForResult(i, 1);

    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        //Pronto, você tem o retorno para a sua Activity, ai se você quiser retornar algum valor da outra
        //Activity, isso tambem é possivel
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
            Intent it = new Intent(ListaVeiculo.this, ListaLocacao.class);
            startActivity(it);
        } else if (id == R.id.nav_clientes) {
            Intent it = new Intent(ListaVeiculo.this, ListaCliente.class);
            startActivity(it);
        } else if (id == R.id.nav_carros) {
            if(active){

            }else{
                Intent it = new Intent(ListaVeiculo.this, ListaVeiculo.class);
                startActivity(it);
            }
        } else if (id == R.id.nav_relatorios) {
            Intent it = new Intent(ListaVeiculo.this, Relatorios.class);
            startActivity(it);

        } else if (id == R.id.nav_funcionarios) {
            Intent it = new Intent(ListaVeiculo.this, Funcionario.class);
            startActivity(it);
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

    public List listaTodos(){

        banco = new Banco(this);
        db = banco.getReadableDatabase();
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
}
