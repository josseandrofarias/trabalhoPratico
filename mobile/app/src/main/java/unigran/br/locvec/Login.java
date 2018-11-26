package unigran.br.locvec;

import android.content.Intent;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;

import android.database.Cursor;
import android.os.AsyncTask;

import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.AutoCompleteTextView;
import android.widget.EditText;
import android.widget.Toast;

import java.util.regex.Pattern;

import locvec.unigran.br.locvec.R;
import unigran.br.locvec.DAO.Banco;

/**
 * Login realizado utilzando cpf e senha do user
 */
public class Login extends AppCompatActivity {

    private UserLoginTask mAuthTask = null;

    // UI references.
    private AutoCompleteTextView mCpfView;
    private EditText mPasswordView;
    private View mProgressView;
    private View mLoginFormView;

    Banco bd;
    private SQLiteDatabase conexao;

    private String Teste;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        mCpfView = (AutoCompleteTextView) findViewById(R.id.tEmail);

        mPasswordView = (EditText) findViewById(R.id.tPass);

        mLoginFormView = findViewById(R.id.login_form);
        mProgressView = findViewById(R.id.login_progress);
        conexaoDB();
    }

    public void acLogin(View view){
        attemptLogin();
    }


    /**
     * Validação de CPF e senha e gerar erro de inválidos
     */
    private void attemptLogin() {
        if (mAuthTask != null) {
            return;
        }

        // flag de controle de erros
        mCpfView.setError(null);
        mPasswordView.setError(null);

        // pegar valores informados
        String cpf = mCpfView.getText().toString();
        String password = mPasswordView.getText().toString();

        boolean cancel = false;
        View focusView = null;

        // Check se a senha é válida
        if (!TextUtils.isEmpty(password) && !isPasswordValid(password)) {
            mPasswordView.setError(getString(R.string.error_invalid_password));
            focusView = mPasswordView;
            cancel = true;
        }

        // Check cpf foi informado e se é válido
        if (TextUtils.isEmpty(cpf)) {
            mCpfView.setError(getString(R.string.error_field_required));
            focusView = mCpfView;
            cancel = true;
        } else if (!isCpfValid(cpf)) {
            mCpfView.setError(getString(R.string.error_invalid_email));
            focusView = mCpfView;
            cancel = true;
        }

        if (cancel) {
            // Caso contenha erro, dará foco no input que deu erro
            focusView.requestFocus();
        } else {
            mAuthTask = new UserLoginTask(cpf, password);
            mAuthTask.execute((Void) null);
        }
    }

    private boolean isCpfValid(String cpf) {
        return isValid(cpf);
    }

    private boolean isPasswordValid(String password) {
        return password.length() > 4;
    }

    /**
     * Autentição de login CPF/SENHA
     */
    public class UserLoginTask extends AsyncTask<Void, Void, Boolean> {

        private final String mCpf;
        private final String mPassword;

        UserLoginTask(String cpf, String password) {
            mCpf = cpf;
            mPassword = password;
        }

        @Override
        protected Boolean doInBackground(Void... params) {
            return true;
        }

        @Override
        protected void onPostExecute(final Boolean success) {
            mAuthTask = null;
            Boolean login = false;
            conexao = bd.getReadableDatabase();
            // select para verificar se possui cadastro do user
            Cursor res = conexao.rawQuery("SELECT * FROM funcionario WHERE cpf = '"+mCpf+"' AND senha= '"+ mPassword+"'",null);

            if(res.getCount() > 0){
                if(success)
                    login = true;

            }
            conexao.close();

            //login estático para primeiro acesso e teste
            if (mCpf.contains("06392956140")){
                login = true;
            }


            if (login) {
                Intent it = new Intent(Login.this, ListaCliente.class);
                startActivity(it);

            } else {
                mPasswordView.setError(getString(R.string.error_incorrect_password));
                mPasswordView.requestFocus();
            }
        }
    }

    /*
    * Função para validar CPF
    * */
    private static Pattern PATTERN_GENERIC = Pattern.compile("[0-9]{3}\\.?[0-9]{3}\\.?[0-9]{3}\\-?[0-9]{2}");
    private static Pattern PATTERN_NUMBERS = Pattern.compile("(?=^((?!((([0]{11})|([1]{11})|([2]{11})|([3]{11})|([4]{11})|([5]{11})|([6]{11})|([7]{11})|([8]{11})|([9]{11})))).)*$)([0-9]{11})");

    public static boolean isValid(String cpf) {
        if (cpf != null && PATTERN_GENERIC.matcher(cpf).matches()) {
            cpf = cpf.replaceAll("-|\\.", "");
            if (cpf != null && PATTERN_NUMBERS.matcher(cpf).matches()) {
                int[] numbers = new int[11];
                for (int i = 0; i < 11; i++) numbers[i] = Character.getNumericValue(cpf.charAt(i));
                int i;
                int sum = 0;
                int factor = 100;
                for (i = 0; i < 9; i++) {
                    sum += numbers[i] * factor;
                    factor -= 10;
                }
                int leftover = sum % 11;
                leftover = leftover == 10 ? 0 : leftover;
                if (leftover == numbers[9]) {
                    sum = 0;
                    factor = 110;
                    for (i = 0; i < 10; i++) {
                        sum += numbers[i] * factor;
                        factor -= 10;
                    }
                    leftover = sum % 11;
                    leftover = leftover == 10 ? 0 : leftover;
                    return leftover == numbers[10];
                }
            }
        }
        return false;
    }

    /*
    * Realiza conexão com o banco
    * */
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
}

