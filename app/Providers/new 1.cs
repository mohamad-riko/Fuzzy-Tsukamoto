namespace program1
{
public partial class Form1 : Form
{
	public Form1()
	{
		InitializeCompnent();
	}
	private void hitung_Click(object sender, EventArgs e)
	{
		double input BB, BA;
		double uRingan, uBerat;
		{
			input = double.Parse(inputX.Text);
			BB = double.Parse(Ringan.Text);
			BA = double.Parse(Berat.Text);
			uRingan = rumus.turun(BB, BA, input);
			uBerat = rumus.naik(BB, BA, input);
			textBox1.Text = uRingan.TosString();
			textBox2.Text = uBerat.TosString();

		}
		double uSedikit, uBanyak;
		{
			input = double.Parse(inputY.Text);
			BB = double.Parse(sedikit.Text);
			BA = double.Parse(banyak.Text);

			double kurang, tambah;
			kurang = double.Parse(berkurang.Text);
			tambah = double.Parse(bertambah.Text);
			double p1, p2, p3, p4, z1, z2, z3, z4, z;
			p1 = Math.Min(uRingan, uBanyak);
			z1 = tambah - ((tambah - kurang)*p1);
			z_1.Text = z1.TosString();
			p2 = Math.Min(uRingan, uSedikit);
			z2 = tambah - ((tambah - kurang)*p2);
			z_2.Text = z2.TosString();
			p3 = Math.Min(uBerat, uBanyak);
			z3 = ((tambah - kurang)*p3)+kurang;
			z_3.Text = z3.TosString();
			p4 = Math.Min(uBerat, uSedikit);
			z4 = ((tambah - kurang)*p4)+kurang;
			z_4.Text = z4.TosString();
			z = ((p1*z1)+(p2*z2)+(p3*z3)+(p4*z4))/(p1+p2+p3
			hasil.Text = z.TosString();
		}

		private void clear_Click(object sender, EventArgs e)
		{
			Ringan.Clear();Berat.Clear();inputX.Clear();
			textBox1.Clear();textBox2.Clear();
			sedikit.Clear();banyak.Clear();inputY.Clear();
			textBox3.Clear();textBox4.Clear();
			berkurang.Clear();bertambah.Clear();
			z_1.Clear(); z_2.Clear(); z_3.Clear(); z_4.Clear(); hasil.Clear();
		}
		
		private void ResetInput_Click_1(object sender, EventArgs e)
		{
			inputX.Clear(); inputY.Clear();
		}	
	}
}
public partial class rumus 
{
	//BB:Batas Bwah , BA:Batas Atas
	public static double turun(double BB, double BA, double input)

{
	double u;
	if (input <= BB) { u = 1; }
	else if (input >= BA) { u=0; }
	else { u=(BA-input) / (BA-BB);}
	return u;
}
public static double naik(double BB, double BA, double input)
{
	double u;
	if (input <= BB) { u = 0; }
	else if (input >= BA) { u=1; }
	else { u=(input-BB) / (BA-BB);}
	return u;

}
}







	
	 