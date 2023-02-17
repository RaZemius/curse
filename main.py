import requests as req

f = open('dbquery.txt', 'r')

head = {
    'NS': 'tests',
    'DB': 'main',
    'Authorization':'Basic cm9vdDpyb290',
    'Accept': 'application/json'
}



r = req.post('http://localhost:8000/sql', headers=head, data=f.read())
print(r.json())
r = req.post('http://localhost:8000/sql', headers=head, data="SELECT * FROM profile:razem")
print(r.json())