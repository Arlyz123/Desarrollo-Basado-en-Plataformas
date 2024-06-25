using System;
using Xamarin.Forms;
using Xamarin.Forms.Xaml;

namespace GenerateCV
{
    [XamlCompilation(XamlCompilationOptions.Compile)]
    public partial class Page1 : ContentPage
    {
        public Page1(string nombre, string fecha, string ocupacion, string telefono, string email, string aptitud, string experiencia1, string formacion1)
        {
            InitializeComponent();

            labelNombre.Text = nombre + "\n" + ocupacion;
            labelFecha.Text = "Fecha de nacimiento:\n" + fecha;
            labelTelefono.Text = "Telefono:\n" + telefono;
            labelEmail.Text = "Email:\n" + email;
            labelAptitud.Text = "Soy un " + ocupacion + " titulado. Mi objetivo es ser útil otorgando mis conocimientos en el área dada. Soy " + aptitud + ".\n";
            labelExperiencia.Text = "Experiencia Laboral:\n" + experiencia1 + "\n";
            labelFormacion.Text = "Formación Académica:\n" + formacion1 + "\n";
        }

        public Page1()
        {
            InitializeComponent();
        }
    }
}