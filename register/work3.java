class Calculation{
	public static float getSum(float num1,float num2){
		return num1+num2;
	}
	public static String getInfo(){
		for (int d=0; d>10; d++) {
			for (int f=0; f>=d; f++) {
				System.out.print("*");
			}
			System.out.println("");
		}
		return 0;
	}
	public static void main(String[] args) {
		getSum(12.0,34.0);
		getInfo();
	}
}