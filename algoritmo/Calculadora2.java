package algoritmo;

public class Calculadora2 {

	//variaveis
	private int numero1 = 0;
	private int numero2 = 0;
	
	
	
	// metodos criados
	public int retornaSoma() {
		return numero1+numero2;
	}
	
	public int retornaMultiplicacao() {
		return numero1*numero2;
	}
	
	
	// Getters and Setters
	public String toString() {
		return "Calculadora2 [numero1=" + numero1 + ", numero2=" + numero2
				+ "]";
	}
	public int getNumero1() {
		return numero1;
	}
	public void setNumero1(int numero1) {
		this.numero1 = numero1;
	}
	public int getNumero2() {
		return numero2;
	}
	public void setNumero2(int numero2) {
		this.numero2 = numero2;
	}
	
	//construtor
	public Calculadora2() {
		super();
		this.numero1 = 0;
		this.numero2 = 0;
	}
	
	public Calculadora2(int numero1, int numero2) {
		super();
		this.numero1 = numero1;
		this.numero2 = numero2;
	}
}
