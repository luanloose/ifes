package algoritmo;

public class Calculadora3 extends Calculadora2 {
	
	private int numero3 = 0;

	
		// metodos criados
		public int retornaSoma(int num) {
			return getNumero1()+getNumero2()+numero3;
		}
		
		public int retornaMultiplicacao(int num) {
			return getNumero1()*getNumero2()*numero3;
		}

		// get and set
		public int getNumero3() {
			return numero3;
		}

		public void setNumero3(int numero3) {
			this.numero3 = numero3;
		}

		
		//construtores
		public Calculadora3() {
			super();
			this.numero3 = 0;
		}
		
		public Calculadora3(int numero1, int numero2, int numero3) {
			super(numero1, numero2);
			this.numero3 = numero3;
		}
	
	
		
		
}
