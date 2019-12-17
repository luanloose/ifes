
public class Funcionario extends Pessoa {
	
		int matricula;
		String dataEgresso;
		String setor;
		Double salario;
		
		public Funcionario(String nome, String endereco, int matricula,
				String dataEgresso, String setor, Double salario) {
			super(nome, endereco);
			this.matricula = matricula;
			this.dataEgresso = dataEgresso;
			this.setor = setor;
			this.salario = salario;
		}

		@Override
		public String toString() {
			return "Funcionario [matricula=" + matricula + ", dataEgresso="
					+ dataEgresso + ", setor=" + setor + ", salario=" + salario
					+ ", nome=" + nome + ", endereco=" + endereco + "]";
		}

		public int getMatricula() {
			return matricula;
		}

		public void setMatricula(int matricula) {
			this.matricula = matricula;
		}

		public String getDataEgresso() {
			return dataEgresso;
		}

		public void setDataEgresso(String dataEgresso) {
			this.dataEgresso = dataEgresso;
		}

		public String getSetor() {
			return setor;
		}

		public void setSetor(String setor) {
			this.setor = setor;
		}

		public Double getSalario() {
			return salario;
		}

		public void setSalario(Double salario) {
			this.salario = salario;
		}
		
		
		

}
