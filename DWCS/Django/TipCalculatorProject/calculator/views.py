from django.shortcuts import render
from django.http import HttpResponse
import math

# Create your views here.
def home(request):
  return render(request, 'calculator/home.html')

def about(request):
  return render(request, 'calculator/about.html')

def result(request):
  bill = float(request.GET.get('bill', 0))
  tip = int(request.GET.get('tip', 10))
  people = int(request.GET.get('people', 1))
  round = request.GET.get('round')


  totaltip = (bill * tip) / 100
  total = bill + totaltip
  div = total/people

  if (round):
   div = math.ceil(div)


  return render(request, 'calculator/result.html', {
    'bill':bill,
    'tip':tip,
   'totaltip':totaltip,
   'total':total,
    'division':div,
    'people':people
    })


