package unigran.br.locvec.Utilitarios;

public class ValidaCPF {
    private String CPF;
    String s1,s2,s3,s4,s5,s6,s7,s8,s9,confere = "";
    int n1,n2,n3,n4,n5,n6,n7,n8,n9,verificador1,verificador2;
    boolean ret;

    public boolean CPFValida(String CPF) {
        if (CPF.equals("00000000000") || CPF.equals("11111111111") || CPF.equals("22222222222") ||
                CPF.equals("33333333333") || CPF.equals("44444444444") || CPF.equals("55555555555") ||
                CPF.equals("66666666666") || CPF.equals("77777777777") || CPF.equals("88888888888") ||
                CPF.equals("99999999999") || CPF.length() != 11);
            //JOptionPane.showMessageDialog(null, "CPF Invalido!");
        else{
            s1 = CPF.substring(0,1); n1 = Integer.parseInt(s1);
            s2 = CPF.substring(1,2); n2 = Integer.parseInt(s2);
            s3 = CPF.substring(2,3); n3 = Integer.parseInt(s3);
            s4 = CPF.substring(3,4); n4 = Integer.parseInt(s4);
            s5 = CPF.substring(4,5); n5 = Integer.parseInt(s5);
            s6 = CPF.substring(5,6); n6 = Integer.parseInt(s6);
            s7 = CPF.substring(6,7); n7 = Integer.parseInt(s7);
            s8 = CPF.substring(7,8); n8 = Integer.parseInt(s8);
            s9 = CPF.substring(8,9); n9 = Integer.parseInt(s9);

            verificador1 = ((n1*10)+(n2*9)+(n3*8)+(n4*7)+(n5*6)+(n6*5)+(n7*4)+(n8*3)+(n9*2));

            if((verificador1 % 11) < 2 ){
                verificador1 = 0;
            }else{
                verificador1 = 11 - (verificador1 % 11);
            }

            verificador2 = ((n1*11)+(n2*10)+(n3*9)+(n4*8)+(n5*7)+(n6*6)+(n7*5)+(n8*4)+(n9*3)+verificador1 * 2 );

            if((verificador2 % 11) < 2){
                verificador2 = 0;
            }else{
                verificador2 = 11 - (verificador2 % 11);
            }

            confere = (s1 + s2 + s3 + s4 + s5 + s6 + s7 + s8 + s9 + verificador1 + verificador2);

            if(confere.equals(CPF)){
                //CPF VÁLIDO
                ret = true;
            }else{
                //CPF INVÁLIDO
                ret = false;
            }
        }
        return ret;
    }
}
