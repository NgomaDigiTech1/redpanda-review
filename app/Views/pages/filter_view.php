<html>
	<head>
	<title>{ page_title|lower }</title>
	
	</head>
	<body>
		<h4>{ page_title|upper }</h4>
		<h3>{ page_body }</h3>	

		<h5>Date Format 1 {date|date(l dS F Y)}</h5>
		<h5>Date Format {date|date_modify(-5days)}</h5>
		<h5>Date Format {date|date_modify(-5days)|date(l dS F Y)}</h5>
		<h5>Price {price|local_currency(EUR)}</h5>

		<p>{paragraph|limit_chars(100)}</p>
		<p>{paragraph|limit_words(10)}</p>
		
		 <!---------Filters personalisé------------>
		<h3>Mobile chiffre masque : { mobile|mesfiltres(6) }</h3>
		<h4>Nombre de Voyelle : {paragraph|comptervoyelle}</h4>
	</body>
</html>
