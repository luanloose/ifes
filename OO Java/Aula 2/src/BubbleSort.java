/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author 20131tpmi0557
 */
import java.util.Vector;

public class BubbleSort {
    
    public static void ordenaBolha(Vector vetor, int tipo){
        if(tipo==0){
            for(int i=vetor.size()-1;i>=1;i--){
                for(int j=1;j<=i;j++){
                    if(((Empregado)vetor.get(j-1)).getMatricula()>((Empregado)vetor.get(j)).getMatricula()){
                        Empregado aux = (Empregado)vetor.get(j);
                        vetor.set(j,vetor.get(j-1));
                        vetor.set(j-1, aux);
               }
               }
               }
               }
        if(tipo==1){
            for(int i=vetor.size()-1;i>=1;i--){
                for(int j=1;j<=i;j++){
                    if(((Empregado)vetor.get(j-1)).getNome().compareTo(((Empregado)vetor.get(j)).getNome())>0){
                        Empregado aux = (Empregado)vetor.get(j);
                        vetor.set(j,vetor.get(j-1));
                        vetor.set(j-1, aux);
               }
               }
               }
               }
        if(tipo==2){
            for(int i=vetor.size()-1;i>=1;i--){
                for(int j=1;j<=i;j++){
                    if(((Empregado)vetor.get(j-1)).getSalario()>((Empregado)vetor.get(j)).getSalario()){
                        Empregado aux = (Empregado)vetor.get(j);
                        vetor.set(j,vetor.get(j-1));
                        vetor.set(j-1, aux);
               }
               }
               }
               }
        
}
    
}
