package unigran.br.locvec.Entidades;

import android.widget.EditText;

import com.google.gson.annotations.SerializedName;

import java.util.Date;

public class EFuncionario {

    @SerializedName("id")
    private int id;
    @SerializedName("vNome")
    private String vNome;
    @SerializedName("vEndereco")
    private String vEndereco;
    @SerializedName("vRG")
    private String vRG;
    @SerializedName("vCPF")
    private String vCPF;
    @SerializedName("vCargo")
    private String vCargo;
    @SerializedName("vAdmissao")
    private Date vAdmissao;
    @SerializedName("vDemissao")
    private Date vDemissao;
    @SerializedName("vSenha")
    private String vSenha;
    @SerializedName("vFlagSupervisor")
    private Boolean vFlagSupervisor;
    @SerializedName("vFlagDesativado")
    private Boolean vFlagDesativado;

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

    public Date getvAdmissao() {
        return vAdmissao;
    }

    public void setvAdmissao(Date vAdmissao) {
        this.vAdmissao = vAdmissao;
    }

    public Date getvDemissao() {
        return vDemissao;
    }

    public void setvDemissao(Date vDemissao) {
        this.vDemissao = vDemissao;
    }

    public Boolean getvFlagSupervisor() {
        return vFlagSupervisor;
    }

    public void setvFlagSupervisor(Boolean vFlagSupervisor) {
        this.vFlagSupervisor = vFlagSupervisor;
    }

    public Boolean getvFlagDesativado() {
        return vFlagDesativado;
    }

    public void setvFlagDesativado(Boolean vFlagDesativado) {
        this.vFlagDesativado = vFlagDesativado;
    }

    public String getvSenha() {
        return vSenha;
    }

    public void setvSenha(String vSenha) {
        this.vSenha = vSenha;
    }
}
