import java.util.*;

class Test {

	public static void main(String[] args) {
		String s1, s2, s3;
		String a,b,c,full, initials;
		Scanner sc = new Scanner(System.in);
		System.out.print("Enter string (include capital and small): ");
		a = sc.nextLine();
		System.out.print("Enter string to compare ");
		b = sc.nextLine();
		if(a.compareTo(b)==0)
			System.out.println("The strings are exactly equal");
		else 
			System.out.println("The strings are not exactly equal");
		if(a.compareToIgnoreCase(b)==0)
			System.out.println("The strings are ignored equal");
		else
			System.out.println("The strings are not ignored equal");
		System.out.println("Uppercase:\t "+a.toUpperCase());
		System.out.println("Lowercase:\t "+a.toLowerCase());
		System.out.println("First Five Characters are:\t"+a.substring(0,5));
		System.out.println("Enter String to search:\t");
		b = sc.next();
		int n = a.indexOf(b);
		System.out.println(b+" occurs at index:  "+n);
		System.out.print("Enter Full Name:\t");
		a=sc.next();
		System.out.print("Enter Middle Name:\t");
		b=sc.next();
		System.out.print("Enter Last Name:\t");
		c=sc.next();
		full = a + " " + b + " " + c;
		System.out.println("Full name:\t"+full);
		initials = a.charAt(0)+" "+b.charAt(0)+ " "+ c.charAt(0);
		System.out.println("Initials are:\t"+initials);
	}

}