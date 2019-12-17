package calculadora;

import javax.swing.JOptionPane;

public class ControleCalculadora {
	private static float N1;
	private static float N2;
	
	// limpa os campos da calculadora
	public static void limpa(Calculadora calculadora){
		calculadora.getjTextField_Num1().setText("");
		calculadora.getjTextField_Num2().setText("");
		calculadora.getjTextField_Resultado().setText("");		
	}
	
	// soma
	public static float soma(String a, String b) throws NumberFormatException{
		N1 = Float.parseFloat(a);
		N2 = Float.parseFloat(b);		
		return N1 + N2;
	}
	// subtrai
	public static float subtrai(String a, String b) throws NumberFormatException{
		N1 = Float.parseFloat(a);
		N2 = Float.parseFloat(b);		
		return N1 - N2;
	}

	// multiplica
	public static float multiplica(String a, String b) throws NumberFormatException{
		N1 = Float.parseFloat(a);
		N2 = Float.parseFloat(b);		
		return N1 * N2;
	}

	// divide
	public static float divide(String a, String b) throws NumberFormatException{
		N1 = Float.parseFloat(a);
		N2 = Float.parseFloat(b);
		if (N2 == 0){
			throw new ArithmeticException("Erro ao tentar dividir por zero!!!");
		}
		return N1 / N2;
	}
	public static float radiciacao(String a, String b) throws NumberFormatException, RadiciacaoException{
		N1 = Float.parseFloat(a);
		N2 = Float.parseFloat(b);
		if (N1 <= 0){
			throw new RadiciacaoException("Erro: radical negativo", "RADICAL_NEGATIVO");
		}
		if (N2 == 0){
			throw new RadiciacaoException("Erro: radicando nulo", "RADICANDO_NULO");
		}
		return (float) Math.pow(N1, 1/N2);
	}
	
	public static float potencia(String a,String b)throws NumberFormatException{
		N1 = Float.parseFloat(a);
		N2 = Float.parseFloat(b);
		if (N1 <= 0){
			JOptionPane.showMessageDialog(null, "Erro: uso de base zero", "ERRO", 0);
		}
		return (float)Math.pow(N1, N2);
	}
	
}
