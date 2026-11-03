from django.shortcuts import render
from django.http import HttpResponse

# Create your views here.

def home(request):
  #return HttpResponse('Hello there')
  return render(request, 'generator/home.html')


def home(request):
  return render(request, 'generator/password.html', {'password':'fdsafgdsaf'})