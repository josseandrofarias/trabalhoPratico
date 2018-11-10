package unigran.br.locvec.Entidades;

import android.widget.EditText;

import java.util.Date;

public class EFuncionario {
    private String vNome;
    private String vEndereco;
    private String vRG;
    private String vCPF;
    private String vCargo;
    private Date vAdmissao;
    private Date vDemissao;
    private Boolean vFlagSupervisor;
    private Boolean vFlagDesativado;

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
}
