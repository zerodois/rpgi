<!-- Emails use the XHTML Strict doctype -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- The character set should be utf-8 -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width"/>
  <!-- Link to the email's CSS, which will be inlined into the email -->
  <style type="text/css">
  body,
  html, 
  .body,
  h1, h4, p {
    background: white !important;
    text-align: center !important;
  }

  .container.header {
    background: #f3f3f3;
  }

  .body-border {
    border-top: 8px solid #663399;
  }
</style>
</head>

<body>
  <!-- Wrapper for the body of the email -->
  <table class="body" data-made-with-foundation>
    <tr>
      <!-- The class, align, and <center> tag center the container -->
      <td class="float-center" align="center" valign="top">
        <center>
          <!-- The content of your email goes here. -->
          <container class="header">
            <row>
              <columns>
                <h1 class="text-center">Bem vindo ao sistema RPGi</h1>
              </columns>
            </row>
          </container>

          <container class="body-border">
            <row>
              <columns>

                <spacer size="32"></spacer>

                <center>
                  <img src="{{ url('/') }}/images/logo.png" width="200" height="200" style="margin-bottom: 20px;">
                </center>

                <spacer size="16"></spacer>

                <h4>Um mundo de aventuras e emoções a um clique de distância</h4>
                <p>A equipe RPGi lhe deseja sorte no jogo, muitos críticos positivos e o mínimo possível de críticos negativos nessa sua nova jornada :)</p>
                <p>Foi solicitado que sua senha senha foi redefinida, porque como dizia sua mãe, você só não esquece a cabeça porque está grudada. Para que a redefinição seja realizada, você só precisa clicar no link abaixo. Se você não solicitou essa redefinição, apenas ignore esse email :p</p>
                <center>
                  <table class="button large radius">
                    <tr>
                      <td>
                        <table style="background-color: #1BBC9B; border-radius: 4px;">
                          <tr>
                            <td><a href="{{ url('/') }}/#/reset/{!! $hash !!}" style="color: white; text-decoration: none; display: block; padding: 15px 15px; font-size: 1.2em;">Redefinir senha</a></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </center>
              </columns>
            </row>
            <row style="color: #666; font-size: 0.9em;">
              Este é um email gerado automaticamente, não tente respondê-lo :v
            </row>
            <spacer size="16"></spacer>
          </container>

        </center>
      </td>
    </tr>
  </table>
</body>
</html>