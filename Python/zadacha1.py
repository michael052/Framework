def StrRevers(string): 
	index = len(string); 
	result = "Result: "; 

	for index in range(index, 0, -1): 
		index = index - 1; 
		result = result + string[index]; 


	print result; 

print u'Perewernutaya stroka. >' 
input_st = raw_input(); 
StrRevers(input_st)