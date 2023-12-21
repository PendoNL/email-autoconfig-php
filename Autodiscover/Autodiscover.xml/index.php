<?php
$raw = file_get_contents('php://input');
$matches = array();
preg_match('/<EMailAddress>(.*)<\/EMailAddress>/', $raw, $matches);
header('Content-Type: application/xml');
?>
<Autodiscover xmlns="http://schemas.microsoft.com/exchange/autodiscover/responseschema/2006">
  <Response xmlns="http://schemas.microsoft.com/exchange/autodiscover/outlook/responseschema/2006a">
    <User>
      <DisplayName><?php echo $matches[1]; ?></DisplayName>
    </User>
    <Account>
      <AccountType>email</AccountType>
      <Action>settings</Action>
      <Protocol>
        <Type>IMAP</Type>
        <Server>mail.pendo.nl</Server>
        <Port>143</Port>
        <DomainRequired>off</DomainRequired>
        <SPA>off</SPA>
        <SSL>on</SSL>
        <AuthRequired>on</AuthRequired>
        <LoginName><?php echo $matches[1]; ?></LoginName>
      </Protocol>
      <Protocol>
        <Type>SMTP</Type>
        <Server>mail.pendo.nl</Server>
        <Port>587</Port>
        <DomainRequired>off</DomainRequired>
        <SPA>off</SPA>
        <SSL>on</SSL>
        <AuthRequired>on</AuthRequired>
        <LoginName><?php echo $matches[1]; ?></LoginName>
      </Protocol>
    </Account>
  </Response>
</Autodiscover>
