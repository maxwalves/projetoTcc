<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Setor;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function welcome()
    {
        $faqs = FAQ::all();
        $setores = Setor::all();
        return view('welcome', compact('faqs', 'setores'));
    }

    public function sobre()
    {
        $faqs = FAQ::all();
        return view('about', compact('faqs'));
    }

    public function servicos()
    {
        $faqs = FAQ::all();
        return view('servicos', compact('faqs'));
    }

    public function projetos()
    {
        $faqs = FAQ::all();
        return view('projetos', compact('faqs'));
    }

    public function contato()
    {
        $faqs = FAQ::all();
        return view('contato', compact('faqs'));
    }

    public function criacaoSites()
    {
        $faqs = FAQ::all();
        return view('criacaoSites', compact('faqs'));
    }

    public function criacaoSoftware()
    {
        $faqs = FAQ::all();
        return view('criacaoSoftware', compact('faqs'));
    }

    public function criacaoLogo()
    {
        $faqs = FAQ::all();
        return view('criacaoLogo', compact('faqs'));
    }

    public function index()
    {
        $user = auth()->user();
        $faqs = FAQ::all();
        return view('faqs.index', compact('faqs', 'user'));
    }

    public function create()
    {
        return view('faqs.create');
    }

    public function store(Request $request)
    {
        $faq = FAQ::create($request->all());
        return redirect('/faqs')->with('success', 'FAQ criado com sucesso.');
    }

    public function show($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('faqs', compact('faq'));
    }

    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('faqs.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->update($request->all());
        return redirect('/faqs')->with('success', 'FAQ atualizado com sucesso!');
    }

    public function updateFAQ(Request $request, $id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->update($request->all());
        return "FAQ atualizado com sucesso!";
    }

    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();
        return redirect('/faqs')->with('success', 'FAQ removido com sucesso.');
    }
}
