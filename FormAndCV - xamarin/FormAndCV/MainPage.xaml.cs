using System;
using Xamarin.Forms;

namespace FormAndCV
{
    public partial class MainPage : ContentPage
    {
        public MainPage()
        {
            InitializeComponent();
        }

        private void OnGenerarCVClicked(object sender, EventArgs e)
        {
            string nombre = NombreEntry.Text;
            string apellido = ApellidoEntry.Text;
            string email = EmailEntry.Text;
            string telefono = TelefonoEntry.Text;

            CVStackLayout.Children.Clear();

            CVStackLayout.Children.Add(new Label { Text = "Curriculum Vitae", FontSize = 24, HorizontalOptions = LayoutOptions.Center, Margin = new Thickness(0, 20, 0, 20) });
            CVStackLayout.Children.Add(new Label { Text = $"Nombre: {nombre}", FontSize = 18 });
            CVStackLayout.Children.Add(new Label { Text = $"Apellido: {apellido}", FontSize = 18 });
            CVStackLayout.Children.Add(new Label { Text = $"Email: {email}", FontSize = 18 });
            CVStackLayout.Children.Add(new Label { Text = $"Teléfono: {telefono}", FontSize = 18 });
        }
    }
}
