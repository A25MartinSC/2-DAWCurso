from django.shortcuts import render
from .models import Project

# Create your views here.
def home(request):
  projects = Project.objects.all()
  projects = Project.objects.order_by('-title')
  return render(request, 'portfolio/home.html', {'projects':projects})