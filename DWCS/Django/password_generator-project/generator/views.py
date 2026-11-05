from django.shortcuts import render
import random

# Create your views here.
def home(request):
  return render(request, 'generator/home.html')

def password(request):
  vlength = int(request.GET.get('length', 12))
  characters = list('abcdefghijklmopqrstuvwxyz')
  thepassword = ''
  for x in range(vlength):
    thepassword = thepassword + random.choice(characters)

  return render(request, 'generator/password.html', {'newpassword': thepassword})