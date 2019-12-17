package calculadora;

import java.awt.Color;
import java.awt.Component;
import java.awt.Dimension;
import java.awt.Font;
import java.awt.GridLayout;
import java.awt.SystemColor;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;

import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JTextField;
import javax.swing.SwingConstants;
import javax.swing.JToggleButton;

import org.w3c.dom.css.CSSPrimitiveValue;
import org.w3c.dom.css.RGBColor;

@SuppressWarnings("serial")
public class Calculadora extends JFrame implements ActionListener, KeyListener{

	private JPanel jContentPane = null;

	private JLabel jLabel_Num1 = null;

	private JLabel jLabel_Num2 = null;

	private JLabel jLabel_Total = null;

	private JTextField jTextField_Num1 = null;

	private JTextField jTextField_Num2 = null;

	private JButton jButton_Soma = null;

	private JButton jButton_Subtrai = null;

	private JButton jButton_Multiplica = null;

	private JButton jButton_Divide = null;

	private JTextField jTextField_Resultado = null;

	private JButton jButton_Limpa = null;

	private JButton jButton_Radic = null;
	private JButton btn_R;
	private JToggleButton tglBtn;

	/**
	 * This method initializes jTextField_Num1	
	 * 	
	 * @return javax.swing.JTextField	
	 */
	private JTextField getJTextField_Num1() {
		if (jTextField_Num1 == null) {
			jTextField_Num1 = new JTextField();
			jTextField_Num1.setBackground(SystemColor.activeCaptionBorder);
			jTextField_Num1.setHorizontalAlignment(JTextField.CENTER);
		}
		return jTextField_Num1;
	}

	/**
	 * This method initializes jTextField_Num2	
	 * 	
	 * @return javax.swing.JTextField	
	 */
	private JTextField getJTextField_Num2() {
		if (jTextField_Num2 == null) {
			jTextField_Num2 = new JTextField();
			jTextField_Num2.setBackground(SystemColor.activeCaptionBorder);
			jTextField_Num2.setHorizontalAlignment(JTextField.CENTER);
		}
		return jTextField_Num2;
	}

	/**
	 * This method initializes jButton_Soma	
	 * 	
	 * @return javax.swing.JButton	
	 */
	private JButton getJButton_Soma() {
		if (jButton_Soma == null) {
			jButton_Soma = new JButton();
			jButton_Soma.setText("+");
			jButton_Soma.setFont(new Font("Dialog", Font.BOLD, 24));
			jButton_Soma.addActionListener(this);
		}
		return jButton_Soma;
	}

	/**
	 * This method initializes jButton_Subtrai	
	 * 	
	 * @return javax.swing.JButton	
	 */
	private JButton getJButton_Subtrai() {
		if (jButton_Subtrai == null) {
			jButton_Subtrai = new JButton();
			jButton_Subtrai.setText("-");
			jButton_Subtrai.setFont(new Font("Dialog", Font.BOLD, 24));
			jButton_Subtrai.addActionListener(this);
		}
		return jButton_Subtrai;
	}

	/**
	 * This method initializes jButton_Multiplica	
	 * 	
	 * @return javax.swing.JButton	
	 */
	private JButton getJButton_Multiplica() {
		if (jButton_Multiplica == null) {
			jButton_Multiplica = new JButton();
			jButton_Multiplica.setText("*");
		}
		return jButton_Multiplica;
	}

	/**
	 * This method initializes jButton_Divide	
	 * 	
	 * @return javax.swing.JButton	
	 */
	private JButton getJButton_Divide() {
		if (jButton_Divide == null) {
			jButton_Divide = new JButton();
			jButton_Divide.setText("/");
		}
		return jButton_Divide;
	}

	/**
	 * This method initializes jTextField_Resultado	
	 * 	
	 * @return javax.swing.JTextField	
	 */
	private JTextField getJTextField_Resultado() {
		if (jTextField_Resultado == null) {
			jTextField_Resultado = new JTextField();
			jTextField_Resultado.setBackground(SystemColor.activeCaptionBorder);
			jTextField_Resultado.setHorizontalAlignment(JTextField.CENTER);
		}
		return jTextField_Resultado;
	}

	/**
	 * This method initializes jButton_Limpa	
	 * 	
	 * @return javax.swing.JButton	
	 */
	private JButton getJButton_Limpa() {
		if (jButton_Limpa == null) {
			jButton_Limpa = new JButton();
			jButton_Limpa.setText("L");
		}
		return jButton_Limpa;
	}

	/**
	 * This method initializes jButton_Resto	
	 * 	
	 * @return javax.swing.JButton	
	 */
	private JButton getJButton_Resto() {
		if (jButton_Radic == null) {
			jButton_Radic = new JButton();
			jButton_Radic.setIcon(new ImageIcon(Calculadora.class.getResource("/recursos/radiciacao.gif")));
			jButton_Radic.setText("");
			//jButton_Resto.setIcon(new ImageIcon(getClass().getResource("/recursos/logo_sun_small.gif")));
			jButton_Radic.addActionListener(this);
		}
		return jButton_Radic;
	}

	/**
	 * @param args
	 */
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Calculadora application = new Calculadora();
		application.setVisible(true);
	}

	/**
	 * This is the default constructor
	 */
	public Calculadora() {
		super();
		initialize();
	}

	/**
	 * This method initializes this
	 * 
	 * @return void
	 */
	private void initialize() {
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		this.setSize(new Dimension(400, 146));
		this.setLocationRelativeTo(null);
		this.setContentPane(getJContentPane());
		this.setTitle("Calculadora");
		this.pack();
	}

	/**
	 * This method initializes jContentPane
	 * 
	 * @return javax.swing.JPanel
	 */
	private JPanel getJContentPane() {
		if (jContentPane == null) {
			GridLayout gridLayout = new GridLayout();
			gridLayout.setRows(3);
			jLabel_Total = new JLabel();
			jLabel_Total.setText("Total");
			jLabel_Total.setHorizontalAlignment(SwingConstants.CENTER);
			jLabel_Total.setFont(new Font("Malgun Gothic", Font.BOLD | Font.ITALIC, 18));
			jLabel_Total.setEnabled(false);
			jLabel_Num2 = new JLabel();
			jLabel_Num2.setText("B");
			jLabel_Num2.setHorizontalAlignment(SwingConstants.CENTER);
			jLabel_Num2.setFont(new Font("Malgun Gothic", Font.BOLD | Font.ITALIC, 18));
			jLabel_Num2.setEnabled(false);
			jLabel_Num1 = new JLabel();
			jLabel_Num1.setText("A");
			jLabel_Num1.setHorizontalAlignment(SwingConstants.CENTER);
			jLabel_Num1.setFont(new Font("Malgun Gothic", Font.BOLD | Font.ITALIC, 18));
			jLabel_Num1.setEnabled(false);
			jContentPane = new JPanel();
			jContentPane.setLayout(gridLayout);
			jContentPane.add(jLabel_Num1, null);
			jContentPane.add(getJTextField_Num1(), null);
			jContentPane.add(getJButton_Soma(), null);
			jContentPane.add(getJButton_Subtrai(), null);
			jContentPane.add(getBtn_R());
			jContentPane.add(jLabel_Num2, null);
			jContentPane.add(getJTextField_Num2(), null);
			jContentPane.add(getJButton_Multiplica(), null);
			jContentPane.add(getJButton_Divide(), null);
			jContentPane.add(getJButton_Limpa(), null);
			jContentPane.add(jLabel_Total, null);
			jContentPane.add(getJTextField_Resultado(), null);
			jContentPane.add(getJButton_Resto(), null);
			jContentPane.add(getTglBtn());
			
			for(Component c : jContentPane.getComponents()){
				if(c instanceof JButton){
					((JButton)c).setBackground(new Color(120,255,255));
					((JButton)c).setFont(new Font("Dialog", Font.BOLD, 24));
					((JButton)c).addActionListener(this);
				}
			}
			
		}
		return jContentPane;
	}

//*
  	public void actionPerformed(ActionEvent e) {
		// TODO Auto-generated method stub
		// limpa campos
		if (e.getSource()==jButton_Limpa){
			ControleCalculadora.limpa(this); 
			return; // sai da execução deste método
		}
		// leitura dos dados digitados (NÚMEROS EM FORMATO TEXTO) 	
		String A, B, result = "";
		A = jTextField_Num1.getText();
		B = jTextField_Num2.getText();
			
		// processa operações
		if (e.getSource()==jButton_Soma) {
			try {
				// tenta efetauar a soma ... 
				result = String.valueOf(ControleCalculadora.soma(A, B));
			} catch (Exception e1) {
				// em caso de erro lançado pelo método ControleCalculadora.soma(A, B) ... 
				JOptionPane.showMessageDialog(null, "Valor não numérico", "Erro!", JOptionPane.ERROR_MESSAGE);
			}
		}
		if (e.getSource()==this.jButton_Subtrai) {
			try {
				// tenta efetauar a subtração  ... 
				result = String.valueOf(ControleCalculadora.subtrai(A, B));
			} catch (Exception e1) {
				// em caso de erro lançado pelo método ControleCalculadora.subtrai(A, B) ... 
				JOptionPane.showMessageDialog(null, "Valor não numérico", "Erro!", JOptionPane.ERROR_MESSAGE);
			}
		}
		if (e.getSource()==this.jButton_Multiplica) {
			try {
				// tenta efetauar a multiplicação ... 
				result = String.valueOf(ControleCalculadora.multiplica(A, B));
			} catch (Exception e1) {
				// em caso de erro lançado pelo método ControleCalculadora.multiplica(A, B) ... 
				JOptionPane.showMessageDialog(null, "Valor não numérico", "Erro!", JOptionPane.ERROR_MESSAGE);
			}
		}
		if (e.getSource()==this.jButton_Divide) {
			try {
				result = String.valueOf(ControleCalculadora.divide(A, B));
			} catch (Exception e1) {
				JOptionPane.showMessageDialog(null, e1.getMessage(), "Erro!", JOptionPane.ERROR_MESSAGE);
			}
		}
		if (e.getSource()==this.jButton_Radic){
			try {
				result = String.valueOf(ControleCalculadora.radiciacao(A, B));
			} catch (RadiciacaoException e1) {
				JOptionPane.showMessageDialog(null, e1.getMessage(), e1.getErrorCode(), JOptionPane.ERROR_MESSAGE);
			} catch (NumberFormatException e2) {
				JOptionPane.showMessageDialog(null, e2.getMessage(), "Erro!", JOptionPane.ERROR_MESSAGE);
			}
			
		}
		if (e.getSource()==this.btn_R){
			try{
				result = String.valueOf(ControleCalculadora.potencia(A, B));
			}catch (NumberFormatException e2) {
				
				JOptionPane.showMessageDialog(null, 
						"ERRO: "+e2.getMessage(),
						"ERRO",0);
			}
		}
		
		
		this.jTextField_Resultado.setText(""+result);		
	}

	public JTextField getjTextField_Num1() {
		return jTextField_Num1;
	}

	public void setjTextField_Num1(JTextField jTextFieldNum1) {
		jTextField_Num1 = jTextFieldNum1;
	}

	public JTextField getjTextField_Num2() {
		return jTextField_Num2;
	}

	public void setjTextField_Num2(JTextField jTextFieldNum2) {
		jTextField_Num2 = jTextFieldNum2;
	}

	public JTextField getjTextField_Resultado() {
		return jTextField_Resultado;
	}

	public void setjTextField_Resultado(JTextField jTextFieldResultado) {
		jTextField_Resultado = jTextFieldResultado;
	}

	public void keyTyped(KeyEvent arg0) {
		// TODO Auto-generated method stub
		
	}

	public void keyPressed(KeyEvent e) {
		// TODO Auto-generated method stub
		if (e.getSource()==this.jTextField_Num1){
			System.out.println("Digitei "+this.jTextField_Num1.getText());
		}
	}

	public void keyReleased(KeyEvent arg0) {
		// TODO Auto-generated method stub
		
	}
	
	private static void processErrorCodes(RadiciacaoException re) throws RadiciacaoException{
		
		switch (re.getErrorCode()) {
		case "RADICAL_NEGATIVO":
			System.out.println("Radical deve ser > 0!");
			throw re;
		case "RADICANDO_NEGATIVO":
			System.out.println("Radicando deve ser > 0!");
			throw re;
		default:
			System.out.println("Erro desconhecido!!!");
			break;
		}
		
	}
//*/
	private JButton getBtn_R() {
		if (btn_R == null) {
			btn_R = new JButton("R");
		}
		return btn_R;
	}
	private JToggleButton getTglBtn() {
		if (tglBtn == null) {
			tglBtn = new JToggleButton("Mudar cor");
			tglBtn.addActionListener(new ActionListener() {
				public void actionPerformed(ActionEvent arg0) {
					for(Component c : jContentPane.getComponents()){
						if(c instanceof JButton){
							Color cor = ((JButton)c).getBackground();
							((JButton)c).setBackground(
									new Color(
											255-cor.getRed(),
											255-cor.getGreen(),
											255-cor.getBlue()));
						}
					}
				}
			});
		}
		return tglBtn;
	}
}  //  @jve:decl-index=0:visual-constraint="10,10"
