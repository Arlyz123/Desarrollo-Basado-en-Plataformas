using GenerateCV;
using System;
using Xamarin.Forms;

namespace GenerateCV
{
    public partial class MainPage : ContentPage
    {
        public MainPage()
        {
            InitializeComponent();
        }

        async void InformacionAgregada(object sender, EventArgs e)
        {
            var userNombre = entryNombre.Text;
            var userFecha = entryFecha.Text;
            var userOcupacion = entryOcupacion.Text;
            var userTelefono = entryTelefono.Text;
            var userEmail = entryEmail.Text;
            var userAptitud = entryAptitud.Text;
            var userExperiencia1 = entryExperiencia1.Text;
            var userFormacion1 = entryFormacion1.Text;

            await Navigation.PushAsync(new Page1(userNombre, userFecha, userOcupacion, userTelefono, userEmail, userAptitud, userExperiencia1, userFormacion1));
        }
    }
}