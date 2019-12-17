
public class Pessoa {

		String nome;
		String endereco;
		
		
	
		public Pessoa(String nome, String endereco) {
			super();
			this.nome = nome;
			this.endereco = endereco;
		}
		
		
		public String toString() {
			return "Pessoa [nome=" + nome + ", endereco=" + endereco + "]";
		}

		public String getNome() {
			return nome;
		}
		public void setNome(String nome) {
			this.nome = nome;
		}
		public String getEndereco() {
			return endereco;
		}
		public void setEndereco(String endereco) {
			this.endereco = endereco;
		}
		
		
		
		
}
