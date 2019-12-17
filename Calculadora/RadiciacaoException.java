package calculadora;

@SuppressWarnings("serial")
public class RadiciacaoException extends Exception{

//	private static final long serialVersionUID = -208488658488282116L;
	private String errorCode = "0010";
	
	public RadiciacaoException(String message, String errorCode) {
		super(message);
		this.setErrorCode(errorCode);
	}

	public String getErrorCode() {
		return errorCode;
	}

	public void setErrorCode(String errorCode) {
		this.errorCode = errorCode;
	}
}

