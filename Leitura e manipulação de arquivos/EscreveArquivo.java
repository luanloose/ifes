
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Scanner;
/*
 * CRUD para arquivo texto quer armazena dados dos professores.
 * Planilha de professores: 
 * <matrícula>;<nome>;<endereço>;<data-ingresso>;<setor> 
 * 
 */
public class EscreveArquivo {

	public static void main(String[] args) {
		Scanner ler = new Scanner(System.in);

		String nomeArq = "C:\\Users\\aluno.laboratorio\\Desktop\\Luan\\Projeto\\src\\funcionario.csv";

		System.out.printf("Informe o nome do arquivo:\n");
		nomeArq = ler.next();

		FileWriter arq;
		try {
			arq = new FileWriter(nomeArq,true);
			PrintWriter gravarArq = new PrintWriter(arq);		
			gravarArq.println("17011235;José Maria da Silva;Rua Arariboia, 197;22/02/2008;Secretaria");
			arq.close();

			System.out.println("\nOs dados do arquio "+nomeArq+" foram gravados com sucesso!");
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		ler.close();
	}
}