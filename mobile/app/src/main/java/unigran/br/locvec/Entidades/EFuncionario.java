package unigran.br.locvec.Entidades;

import android.content.Intent;
import android.widget.EditText;

import com.google.gson.annotations.SerializedName;

import java.io.Serializable;
import java.util.Date;

public class EFuncionario{

    private int id;
    private String vNome;
    private String vEndereco;
    private String vRG;
    private String vCPF;
    private String vCargo;
    private String vAdmissao;
    private String vDemissao;
    private String vSenha;
    private Integer vFlagSupervisor;
    private Integer vFlagDesativado;

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getvNome() {
        return vNome;
    }

    public void setvNome(String vNome) {
        this.vNome = vNome;
    }

    public String getvEndereco() {
        return vEndereco;
    }

    public void setvEndereco(String vEndereco) {
        this.vEndereco = vEndereco;
    }

    public String getvRG() {
        return vRG;
    }

    public void setvRG(String vRG) {
        this.vRG = vRG;
    }

    public String getvCPF() {
        return vCPF;
    }

    public void setvCPF(String vCPF) {
        this.vCPF = vCPF;
    }

    public String getvCargo() {
        return vCargo;
    }

    public void setvCargo(String vCargo) {
        this.vCargo = vCargo;
    }

    public String getvAdmissao() {
        return vAdmissao;
    }

    public void setvAdmissao(String vAdmissao) {
        this.vAdmissao = vAdmissao;
    }

    public String getvDemissao() {
        return vDemissao;
    }

    public void setvDemissao(String vDemissao) {
        this.vDemissao = vDemissao;
    }

    public Integer getvFlagSupervisor() {
        return vFlagSupervisor;
    }

    public void setvFlagSupervisor(Integer vFlagSupervisor) {
        this.vFlagSupervisor = vFlagSupervisor;
    }

    public Integer getvFlagDesativado() {
        return vFlagDesativado;
    }

    public void setvFlagDesativado(Integer vFlagDesativado) {
        this.vFlagDesativado = vFlagDesativado;
    }

    public String getvSenha() {
        return vSenha;
    }

    public void setvSenha(String vSenha) {
        this.vSenha = vSenha;
    }
}
